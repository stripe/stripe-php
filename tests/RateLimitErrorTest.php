<?php

namespace Stripe;

class RateLimitErrorTest extends TestCase
{
    public function testRateLimit()
    {
        try {
            for ($x = 0; $x <= 100; $x++) {
                Customer::create();
            }
        } catch (Error\RateLimit $e) {
            $this->assertSame(429, $e->getHttpStatus());
        }
    }
}
