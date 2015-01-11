<?php
namespace Stripe;

class ObjectTest extends \PHPUnit_Framework_TestCase
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
}
