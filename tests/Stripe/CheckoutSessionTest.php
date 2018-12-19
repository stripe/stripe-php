<?php

namespace Stripe;

class CheckoutSessionTest extends TestCase
{
    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/checkout_sessions'
        );
        $resource = CheckoutSession::create([
            'allowed_source_types' => ['card'],
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
            'success_url' => 'https://stripe.com/success'
        ]);
        $this->assertInstanceOf('Stripe\\CheckoutSession', $resource);
    }
}
