<?php

namespace Stripe;

class ApplicationFeeTest extends TestCase
{
    public function testUrls()
    {
        $applicationFee = new ApplicationFee('abcd/efgh');
        $this->assertSame(
            $applicationFee->instanceUrl(),
            '/v1/application_fees/abcd%2Fefgh'
        );
    }

    public function testList()
    {
        self::authorizeFromEnv();
        $d = ApplicationFee::all();
        $this->assertSame($d->url, '/v1/application_fees');
    }

    public function testStaticCreateRefund()
    {
        $this->mockRequest(
            'POST',
            '/v1/application_fees/fee_123/refunds',
            array(),
            array('id' => 'fr_123', 'object' => 'fee_refund')
        );

        $feeRefund = ApplicationFee::createRefund(
            'fee_123'
        );

        $this->assertSame('fr_123', $feeRefund->id);
        $this->assertSame('fee_refund', $feeRefund->object);
    }

    public function testStaticRetrieveRefund()
    {
        $this->mockRequest(
            'GET',
            '/v1/application_fees/fee_123/refunds/fr_123',
            array(),
            array('id' => 'fr_123', 'object' => 'fee_refund')
        );

        $feeRefund = ApplicationFee::retrieveRefund(
            'fee_123',
            'fr_123'
        );

        $this->assertSame('fr_123', $feeRefund->id);
        $this->assertSame('fee_refund', $feeRefund->object);
    }

    public function testStaticUpdateRefund()
    {
        $this->mockRequest(
            'POST',
            '/v1/application_fees/fee_123/refunds/fr_123',
            array('metadata' => array('foo' => 'bar')),
            array('id' => 'fr_123', 'object' => 'fee_refund')
        );

        $feeRefund = ApplicationFee::updateRefund(
            'fee_123',
            'fr_123',
            array('metadata' => array('foo' => 'bar'))
        );

        $this->assertSame('fr_123', $feeRefund->id);
        $this->assertSame('fee_refund', $feeRefund->object);
    }

    public function testStaticAllRefunds()
    {
        $this->mockRequest(
            'GET',
            '/v1/application_fees/fee_123/refunds',
            array(),
            array('object' => 'list', 'data' => array())
        );

        $feeRefunds = ApplicationFee::allRefunds(
            'fee_123'
        );

        $this->assertSame('list', $feeRefunds->object);
        $this->assertEmpty($feeRefunds->data);
    }
}
