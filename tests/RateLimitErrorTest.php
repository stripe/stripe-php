<?php

namespace Stripe;

class RateLimitErrorTest extends TestCase
{
    public function testRateLimit()
    {
        try {
            throw new Error\RateLimit(
                "rate limited",
                "some_param",
                429,
                "{'foo':'bar'}",
                array('foo' => 'bar')
            );
            $this->fail("Did not raise error");
        } catch (Error\RateLimit $e) {
            $this->assertSame(429, $e->getHttpStatus());
        }
    }
}
