<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\ApplicationFeeService
 */
final class ApplicationFeeServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'fee_123';
    const TEST_FEEREFUND_ID = 'fr_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ApplicationFeeService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ApplicationFeeService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\ApplicationFee::class, $resources->data[0]);
    }

    public function testAllRefunds()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resources = $this->service->allRefunds(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $resources->data[0]);
    }

    public function testCreateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resource = $this->service->createRefund(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\ApplicationFee::class, $resource);
    }

    public function testRetrieveRefund()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = $this->service->retrieveRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $resource);
    }

    public function testUpdateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = $this->service->updateRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        static::assertInstanceOf(\Stripe\ApplicationFeeRefund::class, $resource);
    }
}
