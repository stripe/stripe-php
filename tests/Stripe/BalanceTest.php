<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Balance
 */
final class BalanceTest extends \Stripe\TestCase
{
    use TestHelper;

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance'
        );
        $resource = Balance::retrieve();
        static::assertInstanceOf(\Stripe\Balance::class, $resource);
    }
}
