<?php

namespace Stripe\Service;

/**
 * @internal
 *
 * @covers \Stripe\Service\PaymentMethodService
 */
final class PaymentMethodServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'pm_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var PaymentMethodService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new PaymentMethodService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/payment_methods'
        );
        $resources = $this->service->all([
            'customer' => 'cus_123',
            'type' => 'card',
        ]);
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Stripe\PaymentMethod::class, $resources->data[0]);
    }

    public function testAttach()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_methods/' . self::TEST_RESOURCE_ID . '/attach'
        );
        $resource = $this->service->attach(self::TEST_RESOURCE_ID, [
            'customer' => 'cus_123',
        ]);
        self::assertInstanceOf(\Stripe\PaymentMethod::class, $resource);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_methods'
        );
        $resource = $this->service->create([
            'type' => 'card',
        ]);
        self::assertInstanceOf(\Stripe\PaymentMethod::class, $resource);
    }

    public function testDetach()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_methods/' . self::TEST_RESOURCE_ID . '/detach'
        );
        $resource = $this->service->detach(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Stripe\PaymentMethod::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/payment_methods/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Stripe\PaymentMethod::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_methods/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Stripe\PaymentMethod::class, $resource);
    }
}
