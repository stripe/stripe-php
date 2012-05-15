<?php

namespace Stripe\Tests;

class InvalidRequestErrorTest extends StripeTestCase
{
	public function testInvalidObject()
	{
		try {
			\Stripe\Customer::retrieve('invalid');
		}
		catch(\Stripe\InvalidRequestError $e)
		{
			$this->assertSame(404, $e->getHttpStatus());
		}
	}
	
	public function testBadData()
	{
		try {
			\Stripe\Charge::create();
		}
		catch(\Stripe\InvalidRequestError $e)
		{
			$this->assertSame(400, $e->getHttpStatus());
		}
	}
}