<?php

namespace Stripe\Service;

class PaymentIntentServiceTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = "pi_123";

    private $client = null;
    private $service = null;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient("sk_test_123", null, MOCK_URL);
        $this->service = new PaymentIntentService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            "get",
            "/v1/payment_intents"
        );
        $resources = $this->service->all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\PaymentIntent::class, $resources->data[0]);
    }

    public function testCapture()
    {
        $this->expectsRequest(
            "post",
            "/v1/payment_intents/" . self::TEST_RESOURCE_ID . "/capture"
        );
        $resource = $this->service->capture(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testConfirm()
    {
        $this->expectsRequest(
            "post",
            "/v1/payment_intents/" . self::TEST_RESOURCE_ID . "/confirm"
        );
        $resource = $this->service->confirm(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            "post",
            "/v1/payment_intents"
        );
        $resource = $this->service->create([
            "amount" => 100,
            "currency" => "usd",
            "payment_method_types" => ["card"],
        ]);
        $this->assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            "get",
            "/v1/payment_intents/" . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            "post",
            "/v1/payment_intents/" . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }
}
