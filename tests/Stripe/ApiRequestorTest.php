<?php

namespace Stripe;

use Stripe\Exception\TemporarySessionExpiredException;
use Stripe\HttpClient\CurlClient;

/**
 * @internal
 *
 * @covers \Stripe\ApiRequestor
 */
final class ApiRequestorTest extends TestCase
{
    use TestHelper;

    public function testEncodeObjects()
    {
        $reflector = new \ReflectionClass(ApiRequestor::class);
        $method = $reflector->getMethod('_encodeObjects');
        $method->setAccessible(true);

        $a = ['customer' => new Customer('abcd')];
        $enc = $method->invoke(null, $a);
        self::assertSame($enc, ['customer' => 'abcd']);

        // Preserves UTF-8
        $v = ['customer' => '☃'];
        $enc = $method->invoke(null, $v);
        self::assertSame($enc, $v);

        // Encodes latin-1 -> UTF-8
        $v = ['customer' => "\xe9"];
        $enc = $method->invoke(null, $v);
        self::assertSame($enc, ['customer' => "\xc3\xa9"]);

        // Encodes booleans
        $v = true;
        $enc = $method->invoke(null, $v);
        self::assertSame('true', $enc);

        $v = false;
        $enc = $method->invoke(null, $v);
        self::assertSame('false', $enc);
    }

    public function testHttpClientInjection()
    {
        $reflector = new \ReflectionClass(ApiRequestor::class);
        $method = $reflector->getMethod('httpClient');
        $method->setAccessible(true);

        $curl = new CurlClient();
        $curl->setTimeout(10);
        ApiRequestor::setHttpClient($curl);

        $injectedCurl = $method->invoke(new ApiRequestor());
        self::assertSame($injectedCurl, $curl);
    }

    public function testDefaultHeaders()
    {
        $reflector = new \ReflectionClass(ApiRequestor::class);
        $method = $reflector->getMethod('_defaultHeaders');
        $method->setAccessible(true);

        // no way to stub static methods with PHPUnit 4.x :(
        Stripe::setAppInfo('MyTestApp', '1.2.34', 'https://mytestapp.example', 'partner_1234');
        $apiKey = 'sk_test_notarealkey';
        $clientInfo = ['httplib' => 'testlib 0.1.2'];

        $headers = $method->invoke(null, $apiKey, $clientInfo);

        $ua = \json_decode($headers['X-Stripe-Client-User-Agent']);
        self::assertSame($ua->application->name, 'MyTestApp');
        self::assertSame($ua->application->version, '1.2.34');
        self::assertSame($ua->application->url, 'https://mytestapp.example');
        self::assertSame($ua->application->partner_id, 'partner_1234');

        self::assertSame($ua->httplib, 'testlib 0.1.2');

        self::assertSame(
            $headers['User-Agent'],
            'Stripe/v1 PhpBindings/' . Stripe::VERSION . ' MyTestApp/1.2.34 (https://mytestapp.example)'
        );

        self::assertSame(
            $headers['Stripe-Version'],
            Stripe::getApiVersion()
        );

        self::assertSame($headers['Authorization'], 'Bearer ' . $apiKey);
    }

    public function testRaisesAuthenticationErrorWhenNoApiKey()
    {
        $this->expectException(Exception\AuthenticationException::class);
        $this->compatExpectExceptionMessageMatches('#No API key provided#');

        Stripe::setApiKey(null);
        Charge::create();
    }

    public function testRaisesInvalidRequestErrorOn400()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            null,
            false,
            [
                'error' => [
                    'type' => 'invalid_request_error',
                    'message' => 'Missing id',
                    'param' => 'id',
                ],
            ],
            400
        );

        try {
            Charge::create();
            self::fail('Did not raise error');
        } catch (Exception\InvalidRequestException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame('Missing id', $e->getMessage());
            self::assertSame('id', $e->getStripeParam());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesIdempotencyErrorOn400AndTypeIdempotencyError()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            null,
            false,
            [
                'error' => [
                    'type' => 'idempotency_error',
                    'message' => "Keys for idempotent requests can only be used with the same parameters they were first used with. Try using a key other than 'abc' if you meant to execute a different request.",
                ],
            ],
            400
        );

        try {
            Charge::create();
            self::fail('Did not raise error');
        } catch (Exception\IdempotencyException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame("Keys for idempotent requests can only be used with the same parameters they were first used with. Try using a key other than 'abc' if you meant to execute a different request.", $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesAuthenticationErrorOn401()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            null,
            false,
            [
                'error' => [
                    'type' => 'invalid_request_error',
                    'message' => 'You did not provide an API key.',
                ],
            ],
            401
        );

        try {
            Charge::create();
            self::fail('Did not raise error');
        } catch (Exception\AuthenticationException $e) {
            self::assertSame(401, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame('You did not provide an API key.', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesCardErrorOn402()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            null,
            false,
            [
                'error' => [
                    'type' => 'card_error',
                    'message' => 'Your card was declined.',
                    'code' => 'card_declined',
                    'decline_code' => 'generic_decline',
                    'charge' => 'ch_declined_charge',
                    'param' => 'exp_month',
                ],
            ],
            402
        );

        try {
            Charge::create();
            self::fail('Did not raise error');
        } catch (Exception\CardException $e) {
            self::assertSame(402, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame('Your card was declined.', $e->getMessage());
            self::assertSame('card_declined', $e->getStripeCode());
            self::assertSame('generic_decline', $e->getDeclineCode());
            self::assertSame('exp_month', $e->getStripeParam());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesPermissionErrorOn403()
    {
        $this->stubRequest(
            'GET',
            '/v1/accounts/foo',
            [],
            null,
            false,
            [
                'error' => [
                    'type' => 'invalid_request_error',
                    'message' => "The provided key 'sk_test_********************1234' does not have access to account 'foo' (or that account does not exist). Application access may have been revoked.",
                ],
            ],
            403
        );

        try {
            Account::retrieve('foo');
            self::fail('Did not raise error');
        } catch (Exception\PermissionException $e) {
            self::assertSame(403, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame("The provided key 'sk_test_********************1234' does not have access to account 'foo' (or that account does not exist). Application access may have been revoked.", $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesInvalidRequestErrorOn404()
    {
        $this->stubRequest(
            'GET',
            '/v1/charges/foo',
            [],
            null,
            false,
            [
                'error' => [
                    'type' => 'invalid_request_error',
                    'message' => 'No such charge: foo',
                    'param' => 'id',
                ],
            ],
            404
        );

        try {
            Charge::retrieve('foo');
            self::fail('Did not raise error');
        } catch (Exception\InvalidRequestException $e) {
            self::assertSame(404, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame('No such charge: foo', $e->getMessage());
            self::assertSame('id', $e->getStripeParam());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesRateLimitErrorOn429()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            null,
            false,
            [
                'error' => [
                    'message' => 'Too many requests',
                ],
            ],
            429
        );

        try {
            Charge::create();
            self::fail('Did not raise error');
        } catch (Exception\RateLimitException $e) {
            self::assertSame(429, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame('Too many requests', $e->getMessage());
        } catch (\Exception $e) {
            \var_dump($e);
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesRateLimitErrorOn400AndCodeRateLimit()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            null,
            false,
            [
                'error' => [
                    'code' => 'rate_limit',
                    'message' => 'Too many requests',
                ],
            ],
            400
        );

        try {
            Charge::create();
            self::fail('Did not raise error');
        } catch (Exception\RateLimitException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::compatAssertIsArray($e->getJsonBody());
            self::assertSame('Too many requests', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesOAuthInvalidRequestError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            [],
            null,
            false,
            [
                'error' => 'invalid_request',
                'error_description' => 'No grant type specified',
            ],
            400,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            self::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidRequestException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::assertSame('invalid_request', $e->getStripeCode());
            self::assertSame('No grant type specified', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesOAuthInvalidClientError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            [],
            null,
            false,
            [
                'error' => 'invalid_client',
                'error_description' => 'No authentication was provided. Send your secret API key using the Authorization header, or as a client_secret POST parameter.',
            ],
            401,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            self::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidClientException $e) {
            self::assertSame(401, $e->getHttpStatus());
            self::assertSame('invalid_client', $e->getStripeCode());
            self::assertSame('No authentication was provided. Send your secret API key using the Authorization header, or as a client_secret POST parameter.', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesOAuthInvalidGrantError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            [],
            null,
            false,
            [
                'error' => 'invalid_grant',
                'error_description' => 'This authorization code has already been used. All tokens issued with this code have been revoked.',
            ],
            400,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            self::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidGrantException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::assertSame('invalid_grant', $e->getStripeCode());
            self::assertSame('This authorization code has already been used. All tokens issued with this code have been revoked.', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesOAuthInvalidScopeError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            [],
            null,
            false,
            [
                'error' => 'invalid_scope',
                'error_description' => 'Invalid scope provided: invalid_scope.',
            ],
            400,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            self::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidScopeException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::assertSame('invalid_scope', $e->getStripeCode());
            self::assertSame('Invalid scope provided: invalid_scope.', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesOAuthUnsupportedGrantTypeError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            [],
            null,
            false,
            [
                'error' => 'unsupported_grant_type',
            ],
            400,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            self::fail('Did not raise error');
        } catch (Exception\OAuth\UnsupportedGrantTypeException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::assertSame('unsupported_grant_type', $e->getStripeCode());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesOAuthUnsupportedResponseTypeError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            [],
            null,
            false,
            [
                'error' => 'unsupported_response_type',
                'error_description' => "Only 'code' response_type is supported, but 'unsupported_response_type' was provided",
            ],
            400,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            self::fail('Did not raise error');
        } catch (Exception\OAuth\UnsupportedResponseTypeException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::assertSame('unsupported_response_type', $e->getStripeCode());
            self::assertSame("Only 'code' response_type is supported, but 'unsupported_response_type' was provided", $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testRaisesV2Error()
    {
        $this->stubRequest(
            'GET',
            '/v2/core/events/evt_123',
            [],
            null,
            false,
            [
                'error' => [
                    'type' => 'temporary_session_expired',
                    'code' => 'session_bad',
                    'message' => 'you messed up',
                ],
            ],
            400,
            BaseStripeClient::DEFAULT_API_BASE
        );

        try {
            $client = new StripeClient('sk_test_123');
            $client->v2->core->events->retrieve('evt_123');
            self::fail('Did not raise error');
        } catch (TemporarySessionExpiredException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::assertSame('temporary_session_expired', $e->getError()->type);
            self::assertSame('session_bad', $e->getStripeCode());
            self::assertSame('you messed up', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testV2CallsFallBackToV1Errors()
    {
        $this->stubRequest(
            'GET',
            '/v2/core/events/evt_123',
            [],
            null,
            false,
            [
                'error' => [
                    'code' => 'invalid_request',
                    'message' => 'your request is invalid',
                    'param' => 'invalid_param',
                ],
            ],
            400,
            BaseStripeClient::DEFAULT_API_BASE
        );

        try {
            $client = new StripeClient('sk_test_123');
            $client->v2->core->events->retrieve('evt_123');
            self::fail('Did not raise error');
        } catch (Exception\InvalidRequestException $e) {
            self::assertSame(400, $e->getHttpStatus());
            self::assertSame('invalid_param', $e->getStripeParam());
            self::assertSame('invalid_request', $e->getStripeCode());
            self::assertSame('your request is invalid', $e->getMessage());
        } catch (\Exception $e) {
            self::fail('Unexpected exception: ' . \get_class($e));
        }
    }

    public function testHeaderStripeVersionGlobal()
    {
        Stripe::setApiVersion('2222-22-22');
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            [
                'Stripe-Version: 2222-22-22',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Charge::create();
    }

    public function testHeaderStripeVersionRequestOptions()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            [
                'Stripe-Version: 2222-22-22',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Charge::create([], ['stripe_version' => '2222-22-22']);
    }

    public function testHeaderStripeAccountGlobal()
    {
        Stripe::setAccountId('acct_123');
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            [
                'Stripe-Account: acct_123',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Charge::create();
    }

    public function testHeaderStripeAccountRequestOptions()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            [
                'Stripe-Account: acct_123',
            ],
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Charge::create([], ['stripe_account' => 'acct_123']);
    }

    public function testHeaderNullStripeAccountRequestOptionsDoesntSendHeader()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            [],
            static function ($array) {
                foreach ($array as $header) {
                    // polyfilled str_starts_with from https://gist.github.com/juliyvchirkov/8f325f9ac534fe736b504b93a1a8b2ce
                    if (0 === strpos(\strtolower($header), 'stripe-account')) {
                        return false;
                    }
                }

                return true;
            },
            false,
            [
                'id' => 'ch_123',
                'object' => 'charge',
            ]
        );
        Charge::create([], ['stripe_account' => null]);
    }

    public function testHeaderStripeContextRequestOptions()
    {
        $this->stubRequest(
            'POST',
            '/v2/billing/meter_event_session',
            [],
            [
                'Stripe-Context: wksp_123',
            ],
            false,
            ['object' => 'billing.meter_event_session'],
            200,
            BaseStripeClient::DEFAULT_API_BASE
        );

        $client = new StripeClient('sk_test_123');
        $client->v2->billing->meterEventSession->create([], ['stripe_context' => 'wksp_123']);
    }

    public function testIsDisabled()
    {
        $reflector = new \ReflectionClass(ApiRequestor::class);
        $method = $reflector->getMethod('_isDisabled');
        $method->setAccessible(true);

        $result = $method->invoke(null, '', 'php_uname');
        self::assertFalse($result);

        $result = $method->invoke(null, 'exec', 'php_uname');
        self::assertFalse($result);

        $result = $method->invoke(null, 'exec, procopen', 'php_uname');
        self::assertFalse($result);

        $result = $method->invoke(null, 'exec,procopen', 'php_uname');
        self::assertFalse($result);

        $result = $method->invoke(null, 'exec,php_uname', 'php_uname');
        self::assertTrue($result);

        $result = $method->invoke(null, 'exec, php_uname', 'php_uname');
        self::assertTrue($result);

        $result = $method->invoke(null, 'php_uname, exec', 'php_uname');
        self::assertTrue($result);

        $result = $method->invoke(null, 'procopen,php_uname, exec', 'php_uname');
        self::assertTrue($result);

        $result = $method->invoke(null, 'procopen, php_uname, exec', 'php_uname');
        self::assertTrue($result);
    }

    public function testRaisesForNullBytesInResourceMethod()
    {
        $this->expectException(Exception\InvalidRequestException::class);
        $this->compatExpectExceptionMessageMatches('#null byte#');

        Charge::retrieve("abc_123\0");
    }

    public function testRaisesForNullBytesInRawRequest()
    {
        $this->expectException(Exception\InvalidRequestException::class);
        $this->compatExpectExceptionMessageMatches('#null byte#');

        $client = new BaseStripeClient([
            'api_key' => 'sk_test_client',
        ]);
        $client->rawRequest('get', "/v1/xyz\0");
    }
}
