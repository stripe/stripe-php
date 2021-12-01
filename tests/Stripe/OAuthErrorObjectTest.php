<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\OAuthErrorObject
 */
final class OAuthErrorObjectTest extends \Stripe\TestCase
{
    use TestHelper;

    public function testDefaultValues()
    {
        $error = OAuthErrorObject::constructFrom([]);

        static::assertNull($error->error);
        static::assertNull($error->error_description);
    }
}
