<?php

namespace Stripe\Tests;

class CouponTest extends \PHPUnit_Framework_TestCase
{
	protected function setUp()
	{
		\Stripe\Stripe::setApiKey('tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I');
	}
	
	public function testCreate()
	{
		$id = 'test-coupon-123456';
		
		$c = \Stripe\Coupon::create(array(
				'percent_off' => 25,
				'duration' => 'repeating',
				'duration_in_months' => 5,
				'id' => $id));
		
		$this->assertSame($id, $c->id);
		$this->assertSame(25, $c->percent_off);
	}
}