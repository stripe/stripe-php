<?php

namespace Stripe;

class ObjectTest extends TestCase
{
    public function testArrayAccessorsSemantics()
    {
        $s = new Object();
        $s['foo'] = 'a';
        $this->assertSame($s['foo'], 'a');
        $this->assertTrue(isset($s['foo']));
        unset($s['foo']);
        $this->assertFalse(isset($s['foo']));
    }

    public function testNormalAccessorsSemantics()
    {
        $s = new Object();
        $s->foo = 'a';
        $this->assertSame($s->foo, 'a');
        $this->assertTrue(isset($s->foo));
        unset($s->foo);
        $this->assertFalse(isset($s->foo));
    }

    public function testArrayAccessorsMatchNormalAccessors()
    {
        $s = new Object();
        $s->foo = 'a';
        $this->assertSame($s['foo'], 'a');

        $s['bar'] = 'b';
        $this->assertSame($s->bar, 'b');
    }

    public function testKeys()
    {
        $s = new Object();
        $s->foo = 'a';
        $this->assertSame($s->keys(), array('foo'));
    }

    public function testToArray()
    {
        $s = new Object();
        $s->foo = 'a';

        $converted = $s->__toArray();

        $this->assertInternalType('array', $converted);
        $this->assertArrayHasKey('foo', $converted);
        $this->assertEquals('a', $converted['foo']);
    }

    public function testRecursiveToArray()
    {
        $s = new Object();
        $z = new Object();

        $s->child = $z;
        $z->foo = 'a';

        $converted = $s->__toArray(true);

        $this->assertInternalType('array', $converted);
        $this->assertArrayHasKey('child', $converted);
        $this->assertInternalType('array', $converted['child']);
        $this->assertArrayHasKey('foo', $converted['child']);
        $this->assertEquals('a', $converted['child']['foo']);
    }
}
