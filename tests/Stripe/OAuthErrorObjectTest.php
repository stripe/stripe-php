<?php

namespace Stripe;

/**
 * @internal
 */
final class OAuthErrorObjectTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    public function testDefaultValues()
    {
        $error = OAuthErrorObject::constructFrom([]);

        static::assertNull($error->error);
        static::assertNull($error->error_description);
    }
}
