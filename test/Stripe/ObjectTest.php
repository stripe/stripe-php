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

  public function testToString()
  {
    $s = new Stripe_Object();
    $s->foo = 'a';
    $s->bar = 'b';
    $this->assertEqual("$s", "<Stripe_Object bar=b (unsaved), foo=a (unsaved)>");

    $s->id = '12345';
    $this->assertEqual("$s", "<Stripe_Object[12345] bar=b (unsaved), foo=a (unsaved)>");

    $t = new Stripe_Object();
    $t->id = 'test';
    $t->bar = 'bar';
    $s->baz = $t;
    $this->assertEqual("$s", "<Stripe_Object[12345] bar=b (unsaved), baz=<Stripe_Object[test] ...> (unsaved), foo=a (unsaved)>");
  }
}
