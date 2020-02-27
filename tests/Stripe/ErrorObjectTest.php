<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\ErrorObject
 */
final class ErrorObjectTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    public function testDefaultValues()
    {
        $error = ErrorObject::constructFrom([]);

        static::assertNull($error->charge);
        static::assertNull($error->code);
        static::assertNull($error->decline_code);
        static::assertNull($error->doc_url);
        static::assertNull($error->message);
        static::assertNull($error->param);
        static::assertNull($error->payment_intent);
        static::assertNull($error->payment_method);
        static::assertNull($error->setup_intent);
        static::assertNull($error->source);
        static::assertNull($error->type);
    }
}
