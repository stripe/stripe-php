<?php

namespace Stripe;

// Fake resource that calls GET /v1/coupons/{coupon} but using
// _requestStream to test the _requestStream interface.

class FooResource extends ApiResource
{
    use ApiOperations\Retrieve;
    const OBJECT_NAME = 'coupon';

    public function pdf($readBodyChunk, $params = null, $opts = null)
    {
        $url = $this->instanceUrl();
        list($opts) = $this->_requestStream('get', $url, $readBodyChunk, $params, $opts);

        return $this;
    }
}

/**
 * @internal
 *
 * @coversNothing
 */
final class ApiResourceTest extends TestCase
{
    use TestHelper;

    public function testRestoredResourceRequiresAuthentication()
    {
        Stripe::setApiKey(null);
        $customer = \unserialize(\serialize(Customer::constructFrom(
            ['id' => 'test_customer', 'object' => 'customer'],
            'serialization_test_secret'
        )));
        ApiRequestor::setHttpClient($this->clientMock);
        $this->clientMock->expects(self::never())->method('request');
        $this->expectException(Exception\AuthenticationException::class);

        $customer->refresh();
    }

    /**
     * @dataProvider provideRestoredResourceRefreshUsesExplicitApiKeyCases
     *
     * @param null|string $globalApiKey
     */
    public function testRestoredResourceRefreshUsesExplicitApiKey($globalApiKey)
    {
        Stripe::setApiKey($globalApiKey);
        $values = ['id' => 'test_customer', 'object' => 'customer', 'description' => 'original'];
        $trustedStoredCustomer = \serialize(Customer::constructFrom($values, [
            'api_key' => 'serialization_test_secret',
            'stripe_account' => 'test_account',
        ]));
        $apiKeyFromSecureConfiguration = 'rebound_test_secret';
        $this->stubRequest('GET', '/v1/customers/test_customer', [], [
            'Authorization: Bearer rebound_test_secret',
            'Stripe-Account: test_account',
        ], false, $values);

        $customer = \unserialize($trustedStoredCustomer);
        $customer->setApiKey($apiKeyFromSecureConfiguration);
        self::assertSame([], $customer->serializeParameters());
        self::assertSame($customer, $customer->refresh());
        self::assertSame([], $customer->serializeParameters());
        self::assertSame($globalApiKey, Stripe::getApiKey());
        self::assertStringNotContainsString($apiKeyFromSecureConfiguration, \serialize($customer));
    }

    public static function provideRestoredResourceRefreshUsesExplicitApiKeyCases(): iterable
    {
        return [[null], ['different_global_test_secret']];
    }

    public function testRequestStreaming()
    {
        $foo = FooResource::retrieve('foo');
        $body = '';
        $readBodyChunk = static function ($chunk) use (&$body) {
            $body .= $chunk;
        };

        $foo->pdf($readBodyChunk);

        $parsed = \json_decode($body, true);
        self::assertSame($parsed['object'], 'coupon');
    }
}
