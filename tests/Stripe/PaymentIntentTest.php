<?php

namespace Stripe;

class PaymentIntentTest extends TestCase
{
    const TEST_RESOURCE_ID = 'pi_123';

    // stripe-mock does not support /v1/payment_intents yet so we stub it
    // and create a fixture for it
    public function createFixture()
    {
        $base = [
            'id' => self::TEST_RESOURCE_ID,
            'object' => 'payment_intent',
            'metadata' => [],
        ];
        return PaymentIntent::constructFrom(
            $base,
            new Util\RequestOptions()
        );
    }

    public function testIsListable()
    {
        $this->stubRequest(
            'get',
            '/v1/payment_intents',
            [],
            null,
            false,
            [
                "object" => "list",
                "data" => [
                    $this->createFixture()
                ]
            ]
        );
        $resources = PaymentIntent::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->stubRequest(
            'get',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID,
            [],
            null,
            false,
            $this->createFixture()
        );
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resource);
    }

    public function testIsCreatable()
    {
        $params = [
            "allowed_source_types" => ["card"],
            "amount" => 100,
            "currency" => "usd",
        ];

        $this->stubRequest(
            'post',
            '/v1/payment_intents',
            $params,
            null,
            false,
            $this->createFixture()
        );
        $resource = PaymentIntent::create($params);
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resource);
    }

    public function testIsSaveable()
    {
        $params = [
            "metadata" => ["key" => "value"],
        ];

        $resource = $this->createFixture();
        $resource->metadata["key"] = "value";
        $this->stubRequest(
            'post',
            '/v1/payment_intents/' . $resource->id,
            $params,
            null,
            false,
            $this->createFixture()
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resource);
    }

    public function testIsUpdatable()
    {
        $params = [
            "metadata" => ["key" => "value"],
        ];

        $this->stubRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID,
            $params,
            null,
            false,
            $this->createFixture()
        );
        $resource = PaymentIntent::update(self::TEST_RESOURCE_ID, $params);
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resource);
    }

    public function testIsCancelable()
    {
        $resource = $this->createFixture();
        $this->stubRequest(
            'post',
            '/v1/payment_intents/' . $resource->id . '/cancel',
            [],
            null,
            false,
            $this->createFixture()
        );
        $resource->cancel();
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resource);
    }

    public function testIsCapturable()
    {
        $resource = $this->createFixture();
        $this->stubRequest(
            'post',
            '/v1/payment_intents/' . $resource->id . '/capture',
            [],
            null,
            false,
            $this->createFixture()
        );
        $resource->capture();
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resource);
    }

    public function testIsConfirmable()
    {
        $resource = $this->createFixture();
        $this->stubRequest(
            'post',
            '/v1/payment_intents/' . $resource->id . '/confirm',
            [],
            null,
            false,
            $this->createFixture()
        );
        $resource->confirm();
        $this->assertInstanceOf("Stripe\\PaymentIntent", $resource);
    }
}
