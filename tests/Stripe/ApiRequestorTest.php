<?php

namespace Stripe;

use Stripe\HttpClient\CurlClient;

/**
 * @internal
 * @covers \Stripe\ApiRequestor
 */
final class ApiRequestorTest extends \Stripe\TestCase
{
    use TestHelper;

    public function testEncodeObjects()
    {
        $reflector = new \ReflectionClass(\Stripe\ApiRequestor::class);
        $method = $reflector->getMethod('_encodeObjects');
        $method->setAccessible(true);

        $a = ['customer' => new Customer('abcd')];
        $enc = $method->invoke(null, $a);
        static::assertSame($enc, ['customer' => 'abcd']);

        // Preserves UTF-8
        $v = ['customer' => '☃'];
        $enc = $method->invoke(null, $v);
        static::assertSame($enc, $v);

        // Encodes latin-1 -> UTF-8
        $v = ['customer' => "\xe9"];
        $enc = $method->invoke(null, $v);
        static::assertSame($enc, ['customer' => "\xc3\xa9"]);

        // Encodes booleans
        $v = true;
        $enc = $method->invoke(null, $v);
        static::assertSame('true', $enc);

        $v = false;
        $enc = $method->invoke(null, $v);
        static::assertSame('false', $enc);
    }

    public function testHttpClientInjection()
    {
        $reflector = new \ReflectionClass(\Stripe\ApiRequestor::class);
        $method = $reflector->getMethod('httpClient');
        $method->setAccessible(true);

        $curl = new CurlClient();
        $curl->setTimeout(10);
        ApiRequestor::setHttpClient($curl);

        $injectedCurl = $method->invoke(new ApiRequestor());
        static::assertSame($injectedCurl, $curl);
    }

    public function testDefaultHeaders()
    {
        $reflector = new \ReflectionClass(\Stripe\ApiRequestor::class);
        $method = $reflector->getMethod('_defaultHeaders');
        $method->setAccessible(true);

        // no way to stub static methods with PHPUnit 4.x :(
        Stripe::setAppInfo('MyTestApp', '1.2.34', 'https://mytestapp.example', 'partner_1234');
        $apiKey = 'sk_test_notarealkey';
        $clientInfo = ['httplib' => 'testlib 0.1.2'];

        $headers = $method->invoke(null, $apiKey, $clientInfo);

        $ua = \json_decode($headers['X-Stripe-Client-User-Agent']);
        static::assertSame($ua->application->name, 'MyTestApp');
        static::assertSame($ua->application->version, '1.2.34');
        static::assertSame($ua->application->url, 'https://mytestapp.example');
        static::assertSame($ua->application->partner_id, 'partner_1234');

        static::assertSame($ua->httplib, 'testlib 0.1.2');

        static::assertSame(
            $headers['User-Agent'],
            'Stripe/v1 PhpBindings/' . Stripe::VERSION . ' MyTestApp/1.2.34 (https://mytestapp.example)'
        );

        static::assertSame($headers['Authorization'], 'Bearer ' . $apiKey);
    }

    public function testRaisesAuthenticationErrorWhenNoApiKey()
    {
        $this->expectException(\Stripe\Exception\AuthenticationException::class);
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
            static::fail('Did not raise error');
        } catch (Exception\InvalidRequestException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame('Missing id', $e->getMessage());
            static::assertSame('id', $e->getStripeParam());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\IdempotencyException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame("Keys for idempotent requests can only be used with the same parameters they were first used with. Try using a key other than 'abc' if you meant to execute a different request.", $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\AuthenticationException $e) {
            static::assertSame(401, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame('You did not provide an API key.', $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\CardException $e) {
            static::assertSame(402, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame('Your card was declined.', $e->getMessage());
            static::assertSame('card_declined', $e->getStripeCode());
            static::assertSame('generic_decline', $e->getDeclineCode());
            static::assertSame('exp_month', $e->getStripeParam());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\PermissionException $e) {
            static::assertSame(403, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame("The provided key 'sk_test_********************1234' does not have access to account 'foo' (or that account does not exist). Application access may have been revoked.", $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\InvalidRequestException $e) {
            static::assertSame(404, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame('No such charge: foo', $e->getMessage());
            static::assertSame('id', $e->getStripeParam());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\RateLimitException $e) {
            static::assertSame(429, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame('Too many requests', $e->getMessage());
        } catch (\Exception $e) {
            \var_dump($e);
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\RateLimitException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::compatAssertIsArray($e->getJsonBody());
            static::assertSame('Too many requests', $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidRequestException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::assertSame('invalid_request', $e->getStripeCode());
            static::assertSame('No grant type specified', $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidClientException $e) {
            static::assertSame(401, $e->getHttpStatus());
            static::assertSame('invalid_client', $e->getStripeCode());
            static::assertSame('No authentication was provided. Send your secret API key using the Authorization header, or as a client_secret POST parameter.', $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidGrantException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::assertSame('invalid_grant', $e->getStripeCode());
            static::assertSame('This authorization code has already been used. All tokens issued with this code have been revoked.', $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\OAuth\InvalidScopeException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::assertSame('invalid_scope', $e->getStripeCode());
            static::assertSame('Invalid scope provided: invalid_scope.', $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\OAuth\UnsupportedGrantTypeException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::assertSame('unsupported_grant_type', $e->getStripeCode());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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
            static::fail('Did not raise error');
        } catch (Exception\OAuth\UnsupportedResponseTypeException $e) {
            static::assertSame(400, $e->getHttpStatus());
            static::assertSame('unsupported_response_type', $e->getStripeCode());
            static::assertSame("Only 'code' response_type is supported, but 'unsupported_response_type' was provided", $e->getMessage());
        } catch (\Exception $e) {
            static::fail('Unexpected exception: ' . \get_class($e));
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

    public function testIsDisabled()
    {
        $reflector = new \ReflectionClass(\Stripe\ApiRequestor::class);
        $method = $reflector->getMethod('_isDisabled');
        $method->setAccessible(true);

        $result = $method->invoke(null, '', 'php_uname');
        static::assertFalse($result);

        $result = $method->invoke(null, 'exec', 'php_uname');
        static::assertFalse($result);

        $result = $method->invoke(null, 'exec, procopen', 'php_uname');
        static::assertFalse($result);

        $result = $method->invoke(null, 'exec,procopen', 'php_uname');
        static::assertFalse($result);

        $result = $method->invoke(null, 'exec,php_uname', 'php_uname');
        static::assertTrue($result);

        $result = $method->invoke(null, 'exec, php_uname', 'php_uname');
        static::assertTrue($result);

        $result = $method->invoke(null, 'php_uname, exec', 'php_uname');
        static::assertTrue($result);

        $result = $method->invoke(null, 'procopen,php_uname, exec', 'php_uname');
        static::assertTrue($result);

        $result = $method->invoke(null, 'procopen, php_uname, exec', 'php_uname');
        static::assertTrue($result);
    }
}
