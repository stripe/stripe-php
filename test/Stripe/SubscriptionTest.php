<?php

class Stripe_SubscriptionTest extends StripeTestCase
{

  public function testCreateUpdateCancel()
  {
    $planId = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($planId);

    $customer = self::createTestCustomer();

    $sub = $customer->subscriptions->create(array('plan' => $planId));

    $this->assertEqual($sub->status, 'active');
    $this->assertEqual($sub->plan->id, $planId);

    $sub->quantity = 2;
    $sub->save();

    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertEqual($sub->status, 'active');
    $this->assertEqual($sub->plan->id, $planId);
    $this->assertEqual($sub->quantity, 2);

    $sub->cancel(array('at_period_end' => true));

    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertEqual($sub->status, 'active');
    // @codingStandardsIgnoreStart
    $this->assertTrue($sub->cancel_at_period_end);
    // @codingStandardsIgnoreEnd
  }

  public function testDeleteDiscount()
  {
    $planId = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($planId);

    $couponId = '25off-' . self::randomString();
    self::retrieveOrCreateCoupon($couponId);

    $customer = self::createTestCustomer();

    $sub = $customer->subscriptions->create(
        array(
            'plan' => $plan_id,
            'coupon' => $coupon_id
        )
    );

    $this->assertEqual($sub->status, 'active');
    $this->assertEqual($sub->plan->id, $planId);
    $this->assertEqual($sub->discount->coupon->id, $couponId);

    $sub->deleteDiscount();
    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertNull($sub->discount);
  }
}
