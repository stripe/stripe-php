<?php

class Stripe_CouponTest extends UnitTestCase
{
  public function testCreate()
  {
    authorizeFromEnv();
    $id = 'test_coupon-' . self::randomString();
    $c = Stripe_Coupon::create(array('percent_off' => 25,
				    'duration' => 'repeating',
				    'duration_in_months' => 5,
				    'id' => $id));
    $this->assertEqual($id, $c->id);
    $this->assertEqual(25, $c->percent_off);
  }

}
