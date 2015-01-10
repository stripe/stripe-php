<?php

class Stripe_ObjectTest extends PHPUnit_Framework_TestCase
{
  public function testArrayAccessorsSemantics()
  {
    $s = new Stripe_Object();
    $s['foo'] = 'a';
    $this->assertSame($s['foo'], 'a');
    $this->assertTrue(isset($s['foo']));
    unset($s['foo']);
    $this->assertFalse(isset($s['foo']));
  }

  public function testNormalAccessorsSemantics()
  {
    $s = new Stripe_Object();
    $s->foo = 'a';
    $this->assertSame($s->foo, 'a');
    $this->assertTrue(isset($s->foo));
    unset($s->foo);
    $this->assertFalse(isset($s->foo));
  }

  public function testArrayAccessorsMatchNormalAccessors()
  {
    $s = new Stripe_Object();
    $s->foo = 'a';
    $this->assertSame($s['foo'], 'a');

    $s['bar'] = 'b';
    $this->assertSame($s->bar, 'b');
  }

  public function testKeys()
  {
    $s = new Stripe_Object();
    $s->foo = 'a';
    $this->assertSame($s->keys(), array('foo'));
  }
}
