<?php

namespace Stripe\Util;

/**
 * @internal
 *
 * @covers \Stripe\Util\ObjectTypes
 */
final class ObjectTypesTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    public function testMapping()
    {
        self::assertSame(ObjectTypes::mapping['charge'], \Stripe\Charge::class);
        self::assertSame(ObjectTypes::mapping['checkout.session'], \Stripe\Checkout\Session::class);
    }
}
