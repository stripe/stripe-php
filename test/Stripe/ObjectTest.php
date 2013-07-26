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

  public function testToString()
  {

    $s = new Stripe_Object();
    $s->foo = 'a';
    $s->bar = 'b';

    // NOTE: The toString() implementation of Stripe_Object simply converts the
    // object into a JSON string, but the exact format depends on the
    // availability of JSON_PRETTY_PRINT, which isn't available until PHP 5.4.
    // Instead of testing the exact string representation, verify that the
    // object converts into a valid JSON string.

    $string = (string)$s;
    $object = json_decode($string, true);

    $this->assertTrue(is_array($object));
  }
}
