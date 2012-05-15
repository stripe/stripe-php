<?php

namespace Stripe\Tests;

class DiscountTest extends StripeTestCase
{
	public function testDeletion()
	{
		$id = 'test-coupon-' . $this->generateRandomString();
		
		$coupon = \Stripe\Coupon::create(array(
				'percent_off' => 25,
				'duration' => 'repeating',
				'duration_in_months' => 5,
				'id' => $id));
		
		$customer = $this->getTestCustomer(array('coupon' => $id));
		
		$this->assertTrue(isset($customer->discount));
		$this->assertTrue(isset($customer->discount->coupon));
		$this->assertSame($id, $customer->discount->coupon->id);
		
		$customer->deleteDiscount();
		$this->assertFalse(isset($customer->discount));
		
		$customer = \Stripe\Customer::retrieve($customer->id);
		
		$this->assertFalse(isset($customer->discount));
	}
}