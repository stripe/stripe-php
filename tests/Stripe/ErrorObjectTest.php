<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\ErrorObject
 */
final class ErrorObjectTest extends TestCase
{
    use TestHelper;

    public function testDefaultValues()
    {
        $error = ErrorObject::constructFrom([]);

        self::assertNull($error->charge);
        self::assertNull($error->code);
        self::assertNull($error->decline_code);
        self::assertNull($error->doc_url);
        self::assertNull($error->message);
        self::assertNull($error->param);
        self::assertNull($error->payment_intent);
        self::assertNull($error->payment_method);
        self::assertNull($error->setup_intent);
        self::assertNull($error->source);
        self::assertNull($error->type);
    }
}
