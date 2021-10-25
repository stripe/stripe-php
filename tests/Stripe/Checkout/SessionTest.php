<?php

namespace Stripe\Checkout;

/**
 * @internal
 * @covers \Stripe\Checkout\Session
 */
final class SessionTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'cs_123';

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/checkout/sessions'
        );
        $resource = Session::create([
            'cancel_url' => 'https://stripe.com/cancel',
            'client_reference_id' => '1234',
            'line_items' => [
                [
                    'amount' => 123,
                    'currency' => 'usd',
                    'description' => 'item 1',
                    'images' => [
                        'https://stripe.com/img1',
                    ],
                    'name' => 'name',
                    'quantity' => 2,
                ],
            ],
            'payment_intent_data' => [
                'receipt_email' => 'test@stripe.com',
            ],
            'payment_method_types' => ['card'],
            'success_url' => 'https://stripe.com/success',
        ]);
        static::assertInstanceOf(\Stripe\Checkout\Session::class, $resource);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/checkout/sessions/' . self::TEST_RESOURCE_ID
        );
        $resource = Session::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Checkout\Session::class, $resource);
    }

    public function testCanListLineItems()
    {
        $this->expectsRequest(
            'get',
            '/v1/checkout/sessions/' . self::TEST_RESOURCE_ID . '/line_items'
        );
        $resources = Session::allLineItems(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\LineItem::class, $resources->data[0]);
    }
}
