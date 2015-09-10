<?php

namespace Stripe;

class RateLimitErrorTest extends TestCase
{
    private function rateLimitErrorResponse()
    {
        return array(
            'error' => array(),
        );
    }

    public function testRateLimit()
    {
        try {
            $this->mockRequest('GET', '/v1/accounts/acct_DEF', array(), $this->rateLimitErrorResponse(), 429);
            Account::retrieve('acct_DEF');
        } catch (Error\RateLimit $e) {
            $this->assertSame(429, $e->getHttpStatus());
        }
    }
}
