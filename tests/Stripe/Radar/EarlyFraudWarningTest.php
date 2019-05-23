<?php

namespace Stripe\Radar;

class EarlyFraudWarningTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'issfr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/early_fraud_warnings'
        );
        $resources = EarlyFraudWarning::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Radar\\EarlyFraudWarning", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/early_fraud_warnings/' . self::TEST_RESOURCE_ID
        );
        $resource = EarlyFraudWarning::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Radar\\EarlyFraudWarning", $resource);
    }
}
