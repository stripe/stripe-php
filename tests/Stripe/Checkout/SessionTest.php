<?php

namespace Stripe\Checkout;

class SessionTest extends \Stripe\TestCase
{
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
            'success_url' => 'https://stripe.com/success'
        ]);
        $this->assertInstanceOf('Stripe\\Checkout\\Session', $resource);
    }
}
