<?php

namespace Stripe;

use Stripe\HttpClient\CurlClient;

class ApiRequestorTest extends TestCase
{
    public function testEncodeObjects()
    {
        $reflector = new \ReflectionClass('Stripe\\ApiRequestor');
        $method = $reflector->getMethod('_encodeObjects');
        $method->setAccessible(true);

        $a = array('customer' => new Customer('abcd'));
        $enc = $method->invoke(null, $a);
        $this->assertSame($enc, array('customer' => 'abcd'));

        // Preserves UTF-8
        $v = array('customer' => "☃");
        $enc = $method->invoke(null, $v);
        $this->assertSame($enc, $v);

        // Encodes latin-1 -> UTF-8
        $v = array('customer' => "\xe9");
        $enc = $method->invoke(null, $v);
        $this->assertSame($enc, array('customer' => "\xc3\xa9"));
    }

    public function testHttpClientInjection()
    {
        $reflector = new \ReflectionClass('Stripe\\ApiRequestor');
        $method = $reflector->getMethod('httpClient');
        $method->setAccessible(true);

        $curl = new CurlClient();
        $curl->setTimeout(10);
        ApiRequestor::setHttpClient($curl);

        $injectedCurl = $method->invoke(new ApiRequestor());
        $this->assertSame($injectedCurl, $curl);
    }

    public function testDefaultHeaders()
    {
        $reflector = new \ReflectionClass('Stripe\\ApiRequestor');
        $method = $reflector->getMethod('_defaultHeaders');
        $method->setAccessible(true);

        // no way to stub static methods with PHPUnit 4.x :(
        Stripe::setAppInfo('MyTestApp', '1.2.34', 'https://mytestapp.example');
        $apiKey = 'sk_test_notarealkey';
        $clientInfo = array('httplib' => 'testlib 0.1.2');

        $headers = $method->invoke(null, $apiKey, $clientInfo);

        $ua = json_decode($headers['X-Stripe-Client-User-Agent']);
        $this->assertSame($ua->application->name, 'MyTestApp');
        $this->assertSame($ua->application->version, '1.2.34');
        $this->assertSame($ua->application->url, 'https://mytestapp.example');

        $this->assertSame($ua->httplib, 'testlib 0.1.2');

        $this->assertSame(
            $headers['User-Agent'],
            'Stripe/v1 PhpBindings/' . Stripe::VERSION . ' MyTestApp/1.2.34 (https://mytestapp.example)'
        );

        $this->assertSame($headers['Authorization'], 'Bearer ' . $apiKey);
    }

    public function testRaisesInvalidRequestErrorOn400()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            array(),
            null,
            false,
            array(
                'error' => array(
                    'type' => 'invalid_request_error',
                    'message' => 'Missing id',
                    'param' => 'id',
                ),
            ),
            400
        );

        try {
            Charge::create();
            $this->fail("Did not raise error");
        } catch (Error\InvalidRequest $e) {
            $this->assertSame(400, $e->getHttpStatus());
            $this->assertTrue(is_array($e->getJsonBody()));
            $this->assertSame('Missing id', $e->getMessage());
            $this->assertSame('id', $e->getStripeParam());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesAuthenticationErrorOn401()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            array(),
            null,
            false,
            array(
                'error' => array(
                    'type' => 'invalid_request_error',
                    'message' => 'You did not provide an API key.',
                ),
            ),
            401
        );

        try {
            Charge::create();
            $this->fail("Did not raise error");
        } catch (Error\Authentication $e) {
            $this->assertSame(401, $e->getHttpStatus());
            $this->assertTrue(is_array($e->getJsonBody()));
            $this->assertSame('You did not provide an API key.', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesCardErrorOn402()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            array(),
            null,
            false,
            array(
                'error' => array(
                    'type' => 'card_error',
                    'message' => 'Your card was declined.',
                    'code' => 'card_declined',
                    'decline_code' => 'generic_decline',
                    'charge' => 'ch_declined_charge',
                ),
            ),
            402
        );

        try {
            Charge::create();
            $this->fail("Did not raise error");
        } catch (Error\Card $e) {
            $this->assertSame(402, $e->getHttpStatus());
            $this->assertTrue(is_array($e->getJsonBody()));
            $this->assertSame('Your card was declined.', $e->getMessage());
            $this->assertSame('card_declined', $e->getStripeCode());
            $this->assertSame('generic_decline', $e->getDeclineCode());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesPermissionErrorOn403()
    {
        $this->stubRequest(
            'GET',
            '/v1/accounts/foo',
            array(),
            null,
            false,
            array(
                'error' => array(
                    'type' => 'invalid_request_error',
                    'message' => "The provided key 'sk_test_********************1234' does not have access to account 'foo' (or that account does not exist). Application access may have been revoked.",
                ),
            ),
            403
        );

        try {
            Account::retrieve('foo');
            $this->fail("Did not raise error");
        } catch (Error\Permission $e) {
            $this->assertSame(403, $e->getHttpStatus());
            $this->assertTrue(is_array($e->getJsonBody()));
            $this->assertSame("The provided key 'sk_test_********************1234' does not have access to account 'foo' (or that account does not exist). Application access may have been revoked.", $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesInvalidRequestErrorOn404()
    {
        $this->stubRequest(
            'GET',
            '/v1/charges/foo',
            array(),
            null,
            false,
            array(
                'error' => array(
                    'type' => 'invalid_request_error',
                    'message' => 'No such charge: foo',
                    'param' => 'id',
                ),
            ),
            404
        );

        try {
            Charge::retrieve('foo');
            $this->fail("Did not raise error");
        } catch (Error\InvalidRequest $e) {
            $this->assertSame(404, $e->getHttpStatus());
            $this->assertTrue(is_array($e->getJsonBody()));
            $this->assertSame('No such charge: foo', $e->getMessage());
            $this->assertSame('id', $e->getStripeParam());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesRateLimitErrorOn429()
    {
        $this->stubRequest(
            'POST',
            '/v1/charges',
            array(),
            null,
            false,
            array(
                'error' => array(
                    'message' => 'Too many requests',
                ),
            ),
            429
        );

        try {
            Charge::create();
            $this->fail("Did not raise error");
        } catch (Error\RateLimit $e) {
            $this->assertSame(429, $e->getHttpStatus());
            $this->assertTrue(is_array($e->getJsonBody()));
            $this->assertSame('Too many requests', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesOAuthInvalidRequestError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            array(),
            null,
            false,
            array(
                'error' => 'invalid_request',
                'error_description' => 'No grant type specified',
            ),
            400,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            $this->fail("Did not raise error");
        } catch (Error\OAuth\InvalidRequest $e) {
            $this->assertSame(400, $e->getHttpStatus());
            $this->assertSame('invalid_request', $e->getErrorCode());
            $this->assertSame('No grant type specified', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesOAuthInvalidClientError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            array(),
            null,
            false,
            array(
                'error' => 'invalid_client',
                'error_description' => 'No authentication was provided. Send your secret API key using the Authorization header, or as a client_secret POST parameter.',
            ),
            401,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            $this->fail("Did not raise error");
        } catch (Error\OAuth\InvalidClient $e) {
            $this->assertSame(401, $e->getHttpStatus());
            $this->assertSame('invalid_client', $e->getErrorCode());
            $this->assertSame('No authentication was provided. Send your secret API key using the Authorization header, or as a client_secret POST parameter.', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testRaisesOAuthInvalidGrantError()
    {
        $this->stubRequest(
            'POST',
            '/oauth/token',
            array(),
            null,
            false,
            array(
                'error' => 'invalid_grant',
                'error_description' => 'This authorization code has already been used. All tokens issued with this code have been revoked.',
            ),
            400,
            Stripe::$connectBase
        );

        try {
            OAuth::token();
            $this->fail("Did not raise error");
        } catch (Error\OAuth\InvalidGrant $e) {
            $this->assertSame(400, $e->getHttpStatus());
            $this->assertSame('invalid_grant', $e->getErrorCode());
            $this->assertSame('This authorization code has already been used. All tokens issued with this code have been revoked.', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }
}
