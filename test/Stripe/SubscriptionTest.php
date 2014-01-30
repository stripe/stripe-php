<?php

class Stripe_SubscriptionTest extends StripeTestCase
{

  public function testCreateUpdateCancel()
  {
    $plan_id = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($plan_id);

    $customer = self::createTestCustomer();

    $sub = $customer->subscriptions->create(array('plan' => $plan_id));

    $this->assertEqual($sub->status, 'active');
    $this->assertEqual($sub->plan->id, $plan_id);

    $sub->quantity = 2;
    $sub->save();

    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertEqual($sub->status, 'active');
    $this->assertEqual($sub->plan->id, $plan_id);
    $this->assertEqual($sub->quantity, 2);

    $sub->cancel(array('at_period_end' => true));

    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertEqual($sub->status, 'active');
    $this->assertTrue($sub->cancel_at_period_end);
  }

  public function testDeleteDiscount()
  {
    $plan_id = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($plan_id);

    $coupon_id = '25off-' . self::randomString();
    self::retrieveOrCreateCoupon($coupon_id);

    $customer = self::createTestCustomer();

    $sub = $customer->subscriptions->create(
      array(
        'plan' => $plan_id,
        'coupon' => $coupon_id
        ));

    $this->assertEqual($sub->status, 'active');
    $this->assertEqual($sub->plan->id, $plan_id);
    $this->assertEqual($sub->discount->coupon->id, $coupon_id);

    $sub->deleteDiscount();
    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertNull($sub->discount);
  }
}
