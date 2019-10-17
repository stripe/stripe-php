<?php

namespace Stripe;

class StripeClientTest extends TestCase
{
    public function testGetServices()
    {
        $client = new StripeClient("sk_test_123");

        $this->assertInstanceOf(\Stripe\Services\CouponService::class, $client->coupons);
        $this->assertInstanceOf(\Stripe\Services\FileService::class, $client->files);
        $this->assertInstanceOf(\Stripe\Services\Issuing\CardService::class, $client->issuing->cards);
        $this->assertInstanceOf(\Stripe\Services\PaymentSourceService::class, $client->paymentSources);
    }
}
