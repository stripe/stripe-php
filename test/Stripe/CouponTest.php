<?php

class Stripe_CouponTest extends StripeTestCase
{
  public function testSave()
  {
    self::authorizeFromEnv();
    $id = 'test_coupon-' . self::randomString();
    $c = Stripe_Coupon::create(
        array(
            'percent_off' => 25,
            'duration' => 'repeating',
            'duration_in_months' => 5,
            'id' => $id,
        )
    );
    $this->assertEqual($id, $c->id);
    // @codingStandardsIgnoreStart
    $this->assertEqual(25, $c->percent_off);
    // @codingStandardsIgnoreEnd
    $c->metadata['foo'] = 'bar';
    $c->save();

    $stripeCoupon = Stripe_Coupon::retrieve($id);
    $this->assertEqual($c->metadata, $stripeCoupon->metadata);
  }
}
