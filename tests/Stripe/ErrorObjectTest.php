<?php

namespace Stripe;

class ErrorObjectTest extends TestCase
{
    public function testDefaultValues()
    {
        $error = ErrorObject::constructFrom([]);

        $this->assertNull($error->charge);
        $this->assertNull($error->code);
        $this->assertNull($error->decline_code);
        $this->assertNull($error->doc_url);
        $this->assertNull($error->message);
        $this->assertNull($error->param);
        $this->assertNull($error->payment_intent);
        $this->assertNull($error->payment_method);
        $this->assertNull($error->setup_intent);
        $this->assertNull($error->source);
        $this->assertNull($error->type);
    }
}
