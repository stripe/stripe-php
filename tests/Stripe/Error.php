<?php

namespace Stripe\Tests;

class ErrorTest extends StripeTestCase
{
	public function testCreation()
	{
		try {
			throw new \Stripe\Error('hello', 500, '{"foo":"bar"}', array('foo' => 'bar'));
		} 
		catch(\Stripe\Error $e)
		{
			$this->assertSame('hello', $e->getMessage());
			$this->assertSame(500, $e->getHttpStatus());
			$this->assertSame('{"foo":"bar"}', $e->getHttpBody());
			$this->assertSame(array('foo' => 'bar'), $e->getJsonBody());
		}
	}
}