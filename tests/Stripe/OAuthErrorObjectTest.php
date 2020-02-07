<?php

namespace Stripe;

class OAuthErrorObjectTest extends TestCase
{
    public function testDefaultValues()
    {
        $error = OAuthErrorObject::constructFrom([]);

        static::assertNull($error->error);
        static::assertNull($error->error_description);
    }
}
