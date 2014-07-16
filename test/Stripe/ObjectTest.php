<?php

class Stripe_ObjectTest extends UnitTestCase
{
  public function testArrayAccessorsSemantics()
  {
    $s = new Stripe_Object();
    $s['foo'] = 'a';
    $this->assertEqual($s['foo'], 'a');
    $this->assertTrue(isset($s['foo']));
    unset($s['foo']);
    $this->assertFalse(isset($s['foo']));
  }

  public function testNormalAccessorsSemantics()
  {
    $s = new Stripe_Object();
    $s->foo = 'a';
    $this->assertEqual($s->foo, 'a');
    $this->assertTrue(isset($s->foo));
    unset($s->foo);
    $this->assertFalse(isset($s->foo));
  }

  public function testArrayAccessorsMatchNormalAccessors()
  {
    $s = new Stripe_Object();
    $s->foo = 'a';
    $this->assertEqual($s['foo'], 'a');

    $s['bar'] = 'b';
    $this->assertEqual($s->bar, 'b');
  }

  public function testKeys()
  {
    $s = new Stripe_Object();
    $s->foo = 'a';
    $this->assertEqual($s->keys(), array('foo'));
  }
}
