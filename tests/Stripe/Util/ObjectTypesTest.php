<?php

namespace Stripe\Util;

/**
 * @internal
 * @covers \Stripe\Util\ObjectTypes
 */
final class ObjectTypesTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testMapping()
    {
        static::assertSame(\Stripe\Util\ObjectTypes::mapping['charge'], \Stripe\Charge::class);
        static::assertSame(\Stripe\Util\ObjectTypes::mapping['checkout.session'], \Stripe\Checkout\Session::class);
    }
}
