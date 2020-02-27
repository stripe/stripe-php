<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\OrderReturnService
 */
final class OrderReturnServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'orret_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var OrderReturnService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new OrderReturnService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/order_returns'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\OrderReturn::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/order_returns/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\OrderReturn::class, $resource);
    }
}
