<?php

namespace Stripe\Sigma;

class ScheduledQueryRunTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'sqr_123';

    public function testIsListable()
    {
        $resources = ScheduledQueryRun::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $resource = ScheduledQueryRun::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $resource);
    }
}
