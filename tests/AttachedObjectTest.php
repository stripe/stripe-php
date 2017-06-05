<?php

namespace Stripe;

class AttachedObjectTest extends TestCase
{
    public function testCount()
    {
        $ao = new AttachedObject();
        $this->assertSame(0, count($ao));

        $ao['key1'] = 'value1';
        $this->assertSame(1, count($ao));

        $ao['key2'] = 'value2';
        $this->assertSame(2, count($ao));
    }
}
