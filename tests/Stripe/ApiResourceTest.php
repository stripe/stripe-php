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
     * @dataProvider provideRestoredResourceRefreshUsesPerCallApiKeyCases
     *
     * @param null|string $globalApiKey
     */
    public function testRestoredResourceRefreshUsesPerCallApiKey($globalApiKey)
    {
        $customer = self::restoredCustomer();
        Stripe::setApiKey($globalApiKey);
        $this->stubRequest('GET', '/v1/customers/test_customer', [], [
            'Authorization: Bearer per_call_test_secret',
            'Stripe-Account: test_account',
        ], false, ['id' => 'test_customer', 'object' => 'customer', 'description' => 'refreshed']);

        self::assertSame($customer, $customer->refresh(['api_key' => 'per_call_test_secret']));
        self::assertSame('refreshed', $customer->description);
        self::assertSame($globalApiKey, Stripe::getApiKey());
        self::assertStringNotContainsString('per_call_test_secret', \serialize($customer));
    }

    public static function provideRestoredResourceRefreshUsesPerCallApiKeyCases(): iterable
    {
        return [[null], ['different_global_test_secret']];
    }

    public function testRestoredResourceSaveUsesPerCallApiKey()
    {
        $customer = self::restoredCustomer();
        Stripe::setApiKey(null);
        $customer->description = 'changed';
        $this->stubRequest('POST', '/v1/customers/test_customer', [
            'description' => 'changed',
        ], [
            'Authorization: Bearer per_call_test_secret',
            'Stripe-Account: test_account',
        ], false, ['id' => 'test_customer', 'object' => 'customer', 'description' => 'changed']);

        $customer->save(['api_key' => 'per_call_test_secret']);
    }

    public function testRestoredResourceDeleteUsesPerCallApiKey()
    {
        $customer = self::restoredCustomer();
        Stripe::setApiKey(null);
        $this->stubRequest('DELETE', '/v1/customers/test_customer', [], [
            'Authorization: Bearer per_call_test_secret',
            'Stripe-Account: test_account',
        ], false, ['id' => 'test_customer', 'object' => 'customer', 'deleted' => true]);

        $customer->delete(null, ['api_key' => 'per_call_test_secret']);
        self::assertTrue($customer->isDeleted());
    }

    public function testRestoredResourceUsesGlobalFallback()
    {
        $customer = \unserialize(\serialize(Customer::constructFrom(
            ['id' => 'test_customer', 'object' => 'customer'],
            'serialization_test_secret'
        )));
        Stripe::setApiKey('global_test_secret');
        $this->stubRequest('GET', '/v1/customers/test_customer', [], [
            'Authorization: Bearer global_test_secret',
        ], false, ['id' => 'test_customer', 'object' => 'customer']);

        $customer->refresh();
        self::assertSame('global_test_secret', Stripe::getApiKey());
    }

    public function testRefreshPerCallKeyOverridesResourceKey()
    {
        Stripe::setApiKey(null);
        $customer = Customer::constructFrom(['id' => 'test_customer', 'object' => 'customer'], 'resource_test_secret');
        $this->stubRequest('GET', '/v1/customers/test_customer', [], [
            'Authorization: Bearer per_call_test_secret',
        ], false, ['id' => 'test_customer', 'object' => 'customer']);

        $customer->refresh(['api_key' => 'per_call_test_secret']);
    }

    public function testExplicitPerCallKeyOverridesResourceKey()
    {
        Stripe::setApiKey(null);
        $customer = Customer::constructFrom(['id' => 'test_customer', 'object' => 'customer'], 'resource_test_secret');
        $customer->description = 'changed';
        $this->stubRequest('POST', '/v1/customers/test_customer', [
            'description' => 'changed',
        ], ['Authorization: Bearer per_call_test_secret'], false, [
            'id' => 'test_customer',
            'object' => 'customer',
            'description' => 'changed',
        ]);

        $customer->save(['api_key' => 'per_call_test_secret']);
    }

    /**
     * @return Customer
     */
    private static function restoredCustomer()
    {
        return \unserialize(\serialize(Customer::constructFrom(['id' => 'test_customer', 'object' => 'customer'], [
            'api_key' => 'serialization_test_secret',
            'stripe_account' => 'test_account',
        ])));
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
