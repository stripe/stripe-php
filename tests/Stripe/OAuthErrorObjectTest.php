<?php

namespace Stripe;

class OAuthErrorObjectTest extends TestCase
{
    public function testDefaultValues()
    {
        $error = OAuthErrorObject::constructFrom([]);

        $this->assertNull($error->error);
        $this->assertNull($error->error_description);
    }
}
