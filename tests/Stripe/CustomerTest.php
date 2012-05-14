<?php

namespace Stripe\Tests;

class CustomerTest extends \PHPUnit_Framework_TestCase
{
	protected $customer;
	
	protected function setUp()
	{
		\Stripe\Stripe::setApiKey('tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I');
	}
	
	protected function getTestCustomer()
	{
		return \Stripe\Customer::create(array(
				'card' => array(
						'number'    => '4242424242424242',
						'exp_month' => 5,
						'exp_year'  => date('Y') + 3
				)));
	}
	
	public function testDeletion()
	{
		$customer = $this->getTestCustomer();
		$customer->delete();
		
		$this->assertTrue($customer->deleted);
		$this->assertSame(null, $customer['active_card']);
	}
}