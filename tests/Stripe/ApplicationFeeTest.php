<?php

namespace Stripe;

class ApplicationFeeTest extends TestCase
{
    const TEST_RESOURCE_ID = 'fee_123';
    const TEST_FEEREFUND_ID = 'fr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees'
        );
        $resources = ApplicationFee::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\ApplicationFee", get_class($resources->data[0]));
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID
        );
        $resource = ApplicationFee::retrieve(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\ApplicationFee", get_class($resource));
    }

    public function testCanCreateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resource = ApplicationFee::createRefund(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\ApplicationFeeRefund", get_class($resource));
    }

    public function testCanRetrieveRefund()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = ApplicationFee::retrieveRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        $this->assertSame("Stripe\\ApplicationFeeRefund", get_class($resource));
    }

    public function testCanUpdateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = ApplicationFee::updateRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        $this->assertSame("Stripe\\ApplicationFeeRefund", get_class($resource));
    }

    public function testCanListRefunds()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resources = ApplicationFee::allRefunds(self::TEST_RESOURCE_ID);
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\ApplicationFeeRefund", get_class($resources->data[0]));
    }
}
