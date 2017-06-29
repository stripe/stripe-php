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

    public function testErrorInvalidRequest()
    {
        $this->mockRequest(
            'POST',
            '/v1/charges',
            array(),
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
            $this->assertSame('Missing id', $e->getMessage());
            $this->assertSame('id', $e->getStripeParam());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testErrorAuthentication()
    {
        $this->mockRequest(
            'POST',
            '/v1/charges',
            array(),
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
            $this->assertSame('You did not provide an API key.', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testErrorCard()
    {
        $this->mockRequest(
            'POST',
            '/v1/charges',
            array(),
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
            $this->assertSame('Your card was declined.', $e->getMessage());
            $this->assertSame('card_declined', $e->getStripeCode());
            $this->assertSame('generic_decline', $e->getDeclineCode());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testErrorOAuthInvalidRequest()
    {
        $this->mockRequest(
            'POST',
            '/oauth/token',
            array(),
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
            $this->assertSame('invalid_request', $e->getErrorCode());
            $this->assertSame('No grant type specified', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }

    public function testErrorOAuthInvalidGrant()
    {
        $this->mockRequest(
            'POST',
            '/oauth/token',
            array(),
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
            $this->assertSame('invalid_grant', $e->getErrorCode());
            $this->assertSame('This authorization code has already been used. All tokens issued with this code have been revoked.', $e->getMessage());
        } catch (\Exception $e) {
            $this->fail("Unexpected exception: " . get_class($e));
        }
    }
}
