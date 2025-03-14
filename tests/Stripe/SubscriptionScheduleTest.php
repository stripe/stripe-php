<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\SubscriptionSchedule
 */
final class SubscriptionScheduleTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'sub_sched_123';
    const TEST_REVISION_ID = 'sub_sched_rev_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules'
        );
        $resources = SubscriptionSchedule::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(SubscriptionSchedule::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules/' . self::TEST_RESOURCE_ID
        );
        $resource = SubscriptionSchedule::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(SubscriptionSchedule::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules'
        );
        $resource = SubscriptionSchedule::create([
            'phases' => [
                [
                    'items' => [
                        ['price' => 'price_123', 'quantity' => 2],
                    ],
                ],
            ],
        ]);
        self::assertInstanceOf(SubscriptionSchedule::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = SubscriptionSchedule::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(SubscriptionSchedule::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/' . self::TEST_RESOURCE_ID
        );
        $resource = SubscriptionSchedule::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(SubscriptionSchedule::class, $resource);
    }

    public function testIsCancelable()
    {
        $resource = SubscriptionSchedule::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/' . $resource->id . '/cancel',
            []
        );
        $resource->cancel([]);
        self::assertInstanceOf(SubscriptionSchedule::class, $resource);
    }

    public function testIsReleaseable()
    {
        $resource = SubscriptionSchedule::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/' . $resource->id . '/release',
            []
        );
        $resource->release([]);
        self::assertInstanceOf(SubscriptionSchedule::class, $resource);
    }
}
