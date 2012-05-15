<?php

namespace Stripe\Tests;

class CustomerTest extends StripeTestCase
{
	protected $customer;
	
	/* protected function setUp()
	{
		\Stripe\Stripe::setApiKey('tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I');
	} */

	public function testDeletion()
	{
		$customer = $this->getTestCustomer();
		$customer->delete();
		
		$this->assertTrue($customer->deleted);
		$this->assertSame(null, $customer['active_card']);
	}
	
	public function testSave()
	{
		$customer = $this->getTestCustomer();
		
		$customer->email = 'gdb@stripe.com';
		$customer->save();
		
		$this->assertSame($customer->email, 'gdb@stripe.com');
		
		$customer2 = \Stripe\Customer::retrieve($customer->id);
		$this->assertSame($customer->email, $customer2->email);
	}
	
	/**
	 * @expectedException \Stripe\InvalidRequestError
	 */
	public function testBogusAttribute()
	{
		$customer = $this->getTestCustomer();
		$customer->bogus = 'bogus';
		$customer->save();
	}
	
	public function testCancelSubscription()
	{
		//not implemented yet
	}
}