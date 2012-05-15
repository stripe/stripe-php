<?php

namespace Stripe\Tests;

class ChargeErrorTest extends StripeTestCase
{
	/* protected function setUp()
	{
		\Stripe\Stripe::setApiKey('tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I');
	} */
	
	public function testURLs()
	{
		$charge = new \Stripe\Charge('abcd/efgh');
		
		$this->assertSame(\Stripe\Charge::classUrl('\Stripe\Charge'), '/charges');
		$this->assertSame($charge->instanceUrl(), '/charges/abcd%2Fefgh');
	}
	
	public function testCreate()
	{
		$c = \Stripe\Charge::create(array(
				'amount' => 100,
				'currency' => 'usd',
				'card' => array(
						'number' => '4242424242424242',
						'exp_month' => 5,
						'exp_year' => 2015)));
		
		$this->assertTrue($c->paid);
		$this->assertFalse($c->refunded);
	}
	
	public function testRetrieve()
	{
		$c = \Stripe\Charge::create(array(
				'amount' => 100,
				'currency' => 'usd',
				'card' => array(
						'number' => '4242424242424242',
						'exp_month' => 5,
						'exp_year' => 2015)));
		
		$d = \Stripe\Charge::retrieve($c->id);
		
		$this->assertSame($d->id, $c->id);
	}
}