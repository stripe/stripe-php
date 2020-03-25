<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\OrderService
 */
final class OrderServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'or_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var OrderService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new OrderService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/orders'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Order::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/orders'
        );
        $resource = $this->service->create([
            'currency' => 'usd',
        ]);
        static::assertInstanceOf(\Stripe\Order::class, $resource);
    }

    public function testPay()
    {
        $this->expectsRequest(
            'post',
            '/v1/orders/' . self::TEST_RESOURCE_ID . '/pay'
        );
        $resource = $this->service->pay(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Order::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/orders/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Order::class, $resource);
    }

    public function testReturnOrder()
    {
        $this->expectsRequest(
            'post',
            '/v1/orders/' . self::TEST_RESOURCE_ID . '/returns'
        );
        $resource = $this->service->returnOrder(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\OrderReturn::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/orders/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Order::class, $resource);
    }
}
