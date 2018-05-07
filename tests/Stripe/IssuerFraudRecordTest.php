<?php

namespace Stripe;

class IssuerFraudRecordTest extends TestCase
{
    const TEST_RESOURCE_ID = 'issfr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuer_fraud_records'
        );
        $resources = IssuerFraudRecord::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\IssuerFraudRecord", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuer_fraud_records/' . self::TEST_RESOURCE_ID
        );
        $resource = IssuerFraudRecord::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\IssuerFraudRecord", $resource);
    }
}
