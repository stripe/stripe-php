<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\PaymentIntentService
 */
final class PaymentIntentServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'pi_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var PaymentIntentService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new PaymentIntentService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/payment_intents'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resources->data[0]);
    }

    public function testCancel()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource = $this->service->cancel(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testCapture()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/capture'
        );
        $resource = $this->service->capture(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testConfirm()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/confirm'
        );
        $resource = $this->service->confirm(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents'
        );
        $resource = $this->service->create([
            'amount' => 100,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }
}
