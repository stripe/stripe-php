<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\PaymentIntent
 */
final class PaymentIntentTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'pi_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/payment_intents'
        );
        $resources = PaymentIntent::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(PaymentIntent::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID
        );
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(PaymentIntent::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents'
        );
        $resource = PaymentIntent::create([
            'amount' => 100,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);
        self::assertInstanceOf(PaymentIntent::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        self::assertInstanceOf(PaymentIntent::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID
        );
        $resource = PaymentIntent::update(
            self::TEST_RESOURCE_ID,
            [
                'metadata' => ['key' => 'value'],
            ]
        );
        self::assertInstanceOf(PaymentIntent::class, $resource);
    }

    public function testIsCancelable()
    {
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource->cancel();
        self::assertInstanceOf(PaymentIntent::class, $resource);
    }

    public function testIsCapturable()
    {
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/capture'
        );
        $resource->capture();
        self::assertInstanceOf(PaymentIntent::class, $resource);
    }

    public function testIsConfirmable()
    {
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/confirm'
        );
        $resource->confirm();
        self::assertInstanceOf(PaymentIntent::class, $resource);
    }
}
