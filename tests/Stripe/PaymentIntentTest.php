<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\PaymentIntent
 */
final class PaymentIntentTest extends \PHPUnit\Framework\TestCase
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
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID
        );
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
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
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
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
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
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
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testIsCancelable()
    {
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource->cancel();
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testIsCapturable()
    {
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/capture'
        );
        $resource->capture();
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }

    public function testIsConfirmable()
    {
        $resource = PaymentIntent::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payment_intents/' . self::TEST_RESOURCE_ID . '/confirm'
        );
        $resource->confirm();
        static::assertInstanceOf(\Stripe\PaymentIntent::class, $resource);
    }
}
