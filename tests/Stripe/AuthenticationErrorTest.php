<?php

namespace Stripe\Tests;

class AuthenticationErrorTest extends StripeTestCase
{
	public function testInvalidCredentials()
	{
		\Stripe\Stripe::setApiKey('invalid');
		
		try {
			\Stripe\Customer::create();
		}
		catch(\Stripe\AuthenticationError $e) {
			$this->assertSame(401, $e->getHttpStatus());
		}
	}
}