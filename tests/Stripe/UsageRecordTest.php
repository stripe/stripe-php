<?php

namespace Stripe;

class UsageRecordTest extends TestCase
{
    const TEST_RESOURCE_ID = 'usage_record';

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_items/si_123/usage_records'
        );
        $resource = UsageRecord::create([
            'subscription_item' => 'si_123',
            'quantity' => 100,
            'timestamp' => 12341234,
            'action' => 'set'
        ]);
        $this->assertInstanceOf("Stripe\\UsageRecord", $resource);
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testThrowsIfSubscriptionItemIsMissing()
    {
        UsageRecord::create([
            'quantity' => 100,
            'timestamp' => 12341234,
            'action' => 'set'
        ]);
    }
}
