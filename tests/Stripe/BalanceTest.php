<?php

namespace Stripe;

/**
 * @internal
 */
final class BalanceTest extends \PHPUnit\Framework\TestCase
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
