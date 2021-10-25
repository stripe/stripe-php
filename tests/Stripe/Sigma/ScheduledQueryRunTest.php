<?php

namespace Stripe\Sigma;

/**
 * @internal
 * @covers \Stripe\Sigma\ScheduledQueryRun
 */
final class ScheduledQueryRunTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'sqr_123';

    public function testIsListable()
    {
        $resources = ScheduledQueryRun::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $resource = ScheduledQueryRun::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $resource);
    }
}
