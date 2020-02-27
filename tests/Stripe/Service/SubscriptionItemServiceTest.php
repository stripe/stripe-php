<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\SubscriptionItemService
 */
final class SubscriptionItemServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'si_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var SubscriptionItemService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new SubscriptionItemService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_items',
            [
                'subscription' => 'sub_123',
            ]
        );
        $resources = $this->service->all([
            'subscription' => 'sub_123',
        ]);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_items/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $resource);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_items'
        );
        $resource = $this->service->create([
            'plan' => 'plan',
            'subscription' => 'sub_123',
        ]);
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_items/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/subscription_items/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\SubscriptionItem::class, $resource);
        static::assertTrue($resource->isDeleted());
    }

    public function testCreateUsageRecord()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_items/' . self::TEST_RESOURCE_ID . '/usage_records'
        );
        $resource = $this->service->createUsageRecord(self::TEST_RESOURCE_ID, [
            'quantity' => 100,
            'timestamp' => 12341234,
            'action' => 'set',
        ]);
    }

    public function testListUsageRecordSummaries()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_items/' . self::TEST_RESOURCE_ID . '/usage_record_summaries'
        );
        $resources = $this->service->allUsageRecordSummaries(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\UsageRecordSummary::class, $resources->data[0]);
    }
}
