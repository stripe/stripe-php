<?php

namespace Stripe\Tests;

class AuthenticationErrorTest extends \PHPUnit_Framework_TestCase
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