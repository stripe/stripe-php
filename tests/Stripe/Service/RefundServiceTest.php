<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\RefundService
 */
final class RefundServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 're_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var RefundService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new RefundService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/refunds'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Refund::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/refunds'
        );
        $resource = $this->service->create([
            'charge' => 'ch_123',
        ]);
        static::assertInstanceOf(\Stripe\Refund::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/refunds/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Refund::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/refunds/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Refund::class, $resource);
    }
}
