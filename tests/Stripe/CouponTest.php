<?php

namespace Stripe\Tests;

class CouponTest extends StripeTestCase
{
	/* protected function setUp()
	{
		\Stripe\Stripe::setApiKey('tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I');
	} */
	
	/* protected function generateRandomString()
	{
		$chars = 'abcdefghijklmnopqrstuvwxyz';
		$str = '';
		for ($i = 0; $i < 10; $i++) {
			$str .= $chars[rand(0, strlen($chars)-1)];
		}
		
		return $str;
	} */
	
	public function testCreate()
	{
		$id = 'test-coupon-'.$this->generateRandomString();
		
		$c = \Stripe\Coupon::create(array(
				'percent_off' => 25,
				'duration' => 'repeating',
				'duration_in_months' => 5,
				'id' => $id));
		
		$this->assertSame($id, $c->id);
		$this->assertSame(25, $c->percent_off);
	}
}