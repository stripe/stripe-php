<?php

namespace Stripe;

class ErrorTest extends TestCase
{
    public function testCreation()
    {
        try {
            throw new Error\Api(
                "hello",
                500,
                "{'foo':'bar'}",
                array('foo' => 'bar')
            );
            $this->fail("Did not raise error");
        } catch (Error\Api $e) {
            $this->assertSame("hello", $e->getMessage());
            $this->assertSame(500, $e->getHttpStatus());
            $this->assertSame("{'foo':'bar'}", $e->getHttpBody());
            $this->assertSame(array('foo' => 'bar'), $e->getJsonBody());
        }
    }
}
