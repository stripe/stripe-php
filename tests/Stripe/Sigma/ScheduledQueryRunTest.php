<?php

namespace Stripe\Sigma;

class AuthorizationTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'sqr_123';

    // stripe-mock does not support /v1/sigma/scheduled_query_runs yet so we stub it
    // and create a fixture for it
    public function createFixture()
    {
        $base = [
            'id' => self::TEST_RESOURCE_ID,
            'object' => 'scheduled_query_run',
            'metadata' => [],
        ];
        return ScheduledQueryRun::constructFrom(
            $base,
            new \Stripe\Util\RequestOptions()
        );
    }

    public function testIsListable()
    {
        $this->stubRequest(
            'get',
            '/v1/sigma/scheduled_query_runs',
            [],
            null,
            false,
            [
                "object" => "list",
                "data" => [
                    $this->createFixture()
                ]
            ]
        );
        $resources = ScheduledQueryRun::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Sigma\\ScheduledQueryRun", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->stubRequest(
            'get',
            '/v1/sigma/scheduled_query_runs/' . self::TEST_RESOURCE_ID,
            [],
            null,
            false,
            $this->createFixture()
        );
        $resource = ScheduledQueryRun::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Sigma\\ScheduledQueryRun", $resource);
    }
}
