<?php

namespace Stripe\Service\Reporting;

/**
 * @internal
 * @covers \Stripe\Service\Reporting\ReportRunService
 */
final class ReportRunServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'frr_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ReportRunService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ReportRunService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_runs'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Reporting\ReportRun::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $params = [
            'parameters' => [
                'connected_account' => 'acct_123',
            ],
            'report_type' => 'activity.summary.1',
        ];

        $this->expectsRequest(
            'post',
            '/v1/reporting/report_runs',
            $params
        );
        $resource = $this->service->create($params);
        static::assertInstanceOf(\Stripe\Reporting\ReportRun::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_runs/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Reporting\ReportRun::class, $resource);
    }
}
