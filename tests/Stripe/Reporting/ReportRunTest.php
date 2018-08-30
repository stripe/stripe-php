<?php

namespace Stripe\Reporting;

class ReportRunTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'frr_123';

    public function testIsCreatable()
    {
        $params = [
            "parameters" => [
                "connected_account" => "acct_123"
            ],
            "report_type" => "activity.summary.1",
        ];

        $this->expectsRequest(
            'post',
            '/v1/reporting/report_runs',
            $params
        );
        $resource = ReportRun::create($params);
        $this->assertInstanceOf("Stripe\\Reporting\\ReportRun", $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_runs'
        );
        $resources = ReportRun::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Reporting\\ReportRun", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_runs/' . self::TEST_RESOURCE_ID
        );
        $resource = ReportRun::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Reporting\\ReportRun", $resource);
    }
}
