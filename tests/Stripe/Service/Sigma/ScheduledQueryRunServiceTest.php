<?php

namespace Stripe\Service\Sigma;

/**
 * @internal
 * @covers \Stripe\Service\Sigma\ScheduledQueryRunService
 */
final class ScheduledQueryRunServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'sqr_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ScheduledQueryRunService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new ScheduledQueryRunService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/sigma/scheduled_query_runs'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/sigma/scheduled_query_runs/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Sigma\ScheduledQueryRun::class, $resource);
    }
}
