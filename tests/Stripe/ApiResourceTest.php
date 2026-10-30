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
        $nestedValues = ['id' => 'nested_test_customer', 'object' => 'customer'];
        $values = [
            'id' => 'test_customer',
            'object' => 'customer',
            'description' => 'original',
            'nested' => $nestedValues,
        ];
        $trustedStoredCustomer = \serialize(Customer::constructFrom($values, [
            'api_key' => 'serialization_test_secret',
            'stripe_account' => 'test_account',
        ]));
        $apiKeyFromSecureConfiguration = 'rebound_test_secret';
        ApiRequestor::setHttpClient($this->clientMock);
        $this->clientMock->expects(self::exactly(3))->method('request')
            ->with('get', self::anything(), self::callback(static function ($headers) {
                return \in_array('Authorization: Bearer rebound_test_secret', $headers, true)
                    && \in_array('Stripe-Account: test_account', $headers, true);
            }), [], false)
            ->willReturnCallback(static function ($method, $url) use ($values, $nestedValues) {
                self::assertContains($url, [
                    Stripe::$apiBase . '/v1/customers/test_customer',
                    Stripe::$apiBase . '/v1/customers/nested_test_customer',
                ]);

                return [\json_encode($url === Stripe::$apiBase . '/v1/customers/nested_test_customer' ? $nestedValues : $values), 200, []];
            })
        ;

        $customer = \unserialize($trustedStoredCustomer);
        $customer->setApiKey($apiKeyFromSecureConfiguration);
        $nested = $customer['nested'];
        self::assertSame([], $customer->serializeParameters());
        self::assertSame($customer, $customer->refresh());
        self::assertNotSame($nested, $customer['nested']);
        $nested->refresh();
        $customer['nested']->refresh();
        self::assertSame([], $customer->serializeParameters());
        self::assertSame($globalApiKey, Stripe::getApiKey());
        self::assertStringNotContainsString($apiKeyFromSecureConfiguration, \serialize($customer));
    }

    public static function provideRestoredResourceRefreshUsesExplicitApiKeyCases(): iterable
    {
        return [[null], ['different_global_test_secret']];
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

    public function testExplicitPerCallKeyOverridesResourceKey()
    {
        Stripe::setApiKey(null);
        $customer = Customer::constructFrom(['id' => 'test_customer', 'object' => 'customer']);
        $customer->setApiKey('resource_test_secret');
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
