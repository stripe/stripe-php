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

    public function testRestoredResourceRejectsPerCallApiKey()
    {
        $customer = \unserialize(\serialize(Customer::constructFrom(
            ['id' => 'test_customer', 'object' => 'customer'],
            'producer_test_secret'
        )));
        Stripe::setApiKey('global_test_secret');
        ApiRequestor::setHttpClient($this->clientMock);
        $this->clientMock->expects(self::never())->method('request');
        $this->expectException(Exception\AuthenticationException::class);
        $this->expectExceptionMessage('reattachApiKey');
        $customer->delete(null, ['api_key' => 'per_call_test_secret']);
    }

    public function testRestoredStreamingResourceRequiresReattachment()
    {
        $resource = \unserialize(\serialize(new FooResource('coupon_id', 'producer_test_secret')));
        $client = $this->createMock(HttpClient\CurlClient::class);
        ApiRequestor::setHttpClient($client);
        $client->expects(self::never())->method('requestStream');
        $this->expectException(Exception\AuthenticationException::class);
        $this->expectExceptionMessage('reattachApiKey');
        $resource->pdf(static function ($chunk) {}, null, ['api_key' => 'per_call_test_secret']);
    }

    /**
     * @dataProvider provideRequestorRejectsSerializationPlaceholderCases
     *
     * @param bool $streaming
     */
    public function testRequestorRejectsSerializationPlaceholder($streaming)
    {
        $client = $this->createMock(HttpClient\CurlClient::class);
        ApiRequestor::setHttpClient($client);
        $client->expects(self::never())->method('request');
        $client->expects(self::never())->method('requestStream');
        $requestor = new ApiRequestor(Util\RequestOptions::API_KEY_SERIALIZATION_CONSTANT);
        $this->expectException(Exception\AuthenticationException::class);
        $this->expectExceptionMessage('reattachApiKey');
        if ($streaming) {
            $requestor->requestStream('get', '/v1/customers/cus_123', static function ($chunk) {});
        } else {
            $requestor->request('get', '/v1/customers/cus_123');
        }
    }

    public static function provideRequestorRejectsSerializationPlaceholderCases(): iterable
    {
        return [[false], [true]];
    }

    public function testRestoredEventRequiresReattachment()
    {
        $event = Events\V1ProductUpdatedEvent::constructFrom([
            'id' => 'evt_123', 'object' => 'v2.core.event', 'context' => 'acct_child',
            'related_object' => ['id' => 'prod_123', 'type' => 'product', 'url' => '/v1/products/prod_123'],
        ], 'producer_test_secret');
        $restored = \unserialize(\serialize($event));
        ApiRequestor::setHttpClient($this->clientMock);
        $this->clientMock->expects(self::never())->method('request');
        $this->expectException(Exception\AuthenticationException::class);
        $this->expectExceptionMessage('reattachApiKey');
        $restored->fetchRelatedObject();
    }

    public function testReattachedV2SearchResultPaginates()
    {
        $result = V2\SearchResult::constructFrom([
            'object' => 'v2.search_result', 'data' => [['id' => 'one']],
            'next_page_url' => '/v2/widgets/search?page=2', 'total_count' => 2,
        ], ['api_key' => 'producer_test_secret', 'stripe_context' => 'acct_child'], 'v2');
        $result->setFilters(['query' => 'widgets']);
        $restored = \unserialize(\serialize($result));
        $restored->reattachApiKey('worker_test_secret');
        $this->stubRequest('POST', '/v2/widgets/search?page=2', ['query' => 'widgets'], [
            'Authorization: Bearer worker_test_secret', 'Stripe-Context: acct_child',
        ], false, [
            'object' => 'v2.search_result', 'data' => [['id' => 'two']],
            'next_page_url' => null, 'total_count' => 2,
        ]);
        $ids = [];
        foreach ($restored->autoPagingIterator() as $item) {
            $ids[] = $item->id;
        }
        self::assertSame(['one', 'two'], $ids);
    }

    public function testReattachedEventFetchesRelatedObject()
    {
        $event = Events\V1ProductUpdatedEvent::constructFrom([
            'id' => 'evt_123', 'object' => 'v2.core.event', 'context' => 'acct_child',
            'related_object' => ['id' => 'prod_123', 'type' => 'product', 'url' => '/v1/products/prod_123'],
        ], 'producer_test_secret');
        $restored = \unserialize(\serialize($event));
        $restored->reattachApiKey('worker_test_secret');
        $this->stubRequest('GET', '/v1/products/prod_123', [], [
            'Authorization: Bearer worker_test_secret', 'Stripe-Context: acct_child',
            'Stripe-Request-Trigger: event=evt_123',
        ], false, ['id' => 'prod_123', 'object' => 'product']);
        self::assertSame('prod_123', $restored->fetchRelatedObject()->id);
    }

    /**
     * @dataProvider provideRestoredResourceRefreshUsesReattachedApiKeyCases
     *
     * @param null|string $globalApiKey
     */
    public function testRestoredResourceRefreshUsesReattachedApiKey($globalApiKey)
    {
        $customer = self::restoredCustomer();
        Stripe::setApiKey($globalApiKey);
        $this->stubRequest('GET', '/v1/customers/test_customer', [], [
            'Authorization: Bearer per_call_test_secret',
            'Stripe-Account: test_account',
        ], false, ['id' => 'test_customer', 'object' => 'customer', 'description' => 'refreshed']);

        self::assertSame($customer, $customer->refresh());
        self::assertSame('refreshed', $customer->description);
        self::assertSame($globalApiKey, Stripe::getApiKey());
        self::assertStringNotContainsString('per_call_test_secret', \serialize($customer));
    }

    public static function provideRestoredResourceRefreshUsesReattachedApiKeyCases(): iterable
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

    public function testRestoredResourceRejectsGlobalFallback()
    {
        $customer = \unserialize(\serialize(Customer::constructFrom(
            ['id' => 'test_customer', 'object' => 'customer'],
            'serialization_test_secret'
        )));
        Stripe::setApiKey('global_test_secret');
        ApiRequestor::setHttpClient($this->clientMock);
        $this->clientMock->expects(self::never())->method('request');
        $this->expectException(Exception\AuthenticationException::class);
        $this->expectExceptionMessage('reattachApiKey');
        $customer->refresh();
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
        $customer = \unserialize(\serialize(Customer::constructFrom(['id' => 'test_customer', 'object' => 'customer'], [
            'api_key' => 'serialization_test_secret',
            'stripe_account' => 'test_account',
        ])));
        $customer->reattachApiKey('per_call_test_secret');

        return $customer;
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
