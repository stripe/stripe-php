<?php

namespace Stripe\Tests;

class ObjectTest extends StripeTestCase
{
	public function testArrayAccessorsSemantics()
	{
		$s = new \Stripe\Object();
		
		$s['foo'] = 'a';
		
		$this->assertSame($s['foo'], 'a');
		$this->assertTrue(isset($s['foo']));
		
		unset($s['foo']);
		$this->assertFalse(isset($s['foo']));
	}
	
	public function testNormalAccessorsSemantics()
	{
		$s = new \Stripe\Object();
		
		$s->foo = 'a';
		
		$this->assertSame($s->foo, 'a');
		$this->assertTrue(isset($s->foo));
		unset($s->foo);
		$this->assertFalse(isset($s->foo));
	}
	
	public function testArrayAccessorsMatchNormalAccessors()
	{
		$s = new \Stripe\Object();
		$s->foo = 'a';
		$this->assertSame($s['foo'], 'a');
		
		$s['bar'] = 'b';
		$this->assertSame($s->bar, 'b');
	}
	
	public function testToString()
	{
		$s = new \Stripe\Object();
		$s->foo = 'a';
		$s->bar = 'b';
		
		$string = (string) $s;
		$object = json_decode($string, true);
		
		$this->assertTrue(is_array($object));
	}
}