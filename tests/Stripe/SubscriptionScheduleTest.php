<?php

namespace Stripe;

class SubscriptionScheduleTest extends TestCase
{
    const TEST_RESOURCE_ID = 'sub_sched_123';
    const TEST_REVISION_ID = 'sub_sched_rev_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules'
        );
        $resources = SubscriptionSchedule::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\SubscriptionSchedule", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules/' . self::TEST_RESOURCE_ID
        );
        $resource = SubscriptionSchedule::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\SubscriptionSchedule", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules'
        );
        $resource = SubscriptionSchedule::create([
            "phases" => [
                [
                    "plans" => [
                        [ "plan" => "plan_123", "quantity" => 2],
                    ],
                ],
            ],
        ]);
        $this->assertInstanceOf("Stripe\\SubscriptionSchedule", $resource);
    }

    public function testIsSaveable()
    {
        $resource = SubscriptionSchedule::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/' . $resource->id
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\SubscriptionSchedule", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscription_schedules/' . self::TEST_RESOURCE_ID
        );
        $resource = SubscriptionSchedule::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\SubscriptionSchedule", $resource);
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
        $this->assertInstanceOf("Stripe\\SubscriptionSchedule", $resource);
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
        $this->assertInstanceOf("Stripe\\SubscriptionSchedule", $resource);
    }

    public function testRevisions()
    {
        $schedule = SubscriptionSchedule::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules/' . $schedule->id . '/revisions'
        );
        $revisions = $schedule->revisions();
        $this->assertTrue(is_array($revisions->data));
        $this->assertInstanceOf("Stripe\\SubscriptionScheduleRevision", $revisions->data[0]);
    }

    public function testCanRetrieveRevision()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules/' . self::TEST_RESOURCE_ID . '/revisions/' . self::TEST_REVISION_ID
        );
        $resource = SubscriptionSchedule::retrieveRevision(self::TEST_RESOURCE_ID, self::TEST_REVISION_ID);
        $this->assertInstanceOf("Stripe\\SubscriptionScheduleRevision", $resource);
    }

    public function testCanListRevisions()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscription_schedules/' . self::TEST_RESOURCE_ID . '/revisions'
        );
        $resources = SubscriptionSchedule::allRevisions(self::TEST_RESOURCE_ID);
        $this->assertTrue(is_array($resources->data));
    }
}
