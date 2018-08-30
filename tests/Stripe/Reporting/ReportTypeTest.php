<?php

namespace Stripe\Reporting;

class ReportTypeTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'activity.summary.1';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types'
        );
        $resources = ReportType::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Reporting\\ReportType", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types/' . self::TEST_RESOURCE_ID
        );
        $resource = ReportType::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Reporting\\ReportType", $resource);
    }
}
