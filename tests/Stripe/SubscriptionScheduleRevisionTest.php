<?php

namespace Stripe;

class SubscriptionScheduleRevisionTest extends TestCase
{
    const TEST_SCHEDULE_ID = 'sub_sched_123';
    const TEST_RESOURCE_ID = 'sub_sched_rev_123';

    public function testHasCorrectUrl()
    {
        $resource = \Stripe\SubscriptionSchedule::retrieveRevision(self::TEST_SCHEDULE_ID, self::TEST_RESOURCE_ID);
        $this->assertSame(
            "/v1/subscription_schedules/" . self::TEST_SCHEDULE_ID . "/revisions/" . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testIsNotDirectlyRetrievable()
    {
        SubscriptionScheduleRevision::retrieve(self::TEST_RESOURCE_ID);
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testIsNotDirectlyAll()
    {
        SubscriptionScheduleRevision::all();
    }
}
