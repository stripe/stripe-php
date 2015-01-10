<?php

class Stripe_SubscriptionTest extends Stripe_TestCase
{

  public function testCreateUpdateCancel()
  {
    $planID = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($planID);

    $customer = self::createTestCustomer();

    $sub = $customer->subscriptions->create(array('plan' => $planID));

    $this->assertSame($sub->status, 'active');
    $this->assertSame($sub->plan->id, $planID);

    $sub->quantity = 2;
    $sub->save();

    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertSame($sub->status, 'active');
    $this->assertSame($sub->plan->id, $planID);
    $this->assertSame($sub->quantity, 2);

    $sub->cancel(array('at_period_end' => true));

    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertSame($sub->status, 'active');
    // @codingStandardsIgnoreStart
    $this->assertTrue($sub->cancel_at_period_end);
    // @codingStandardsIgnoreEnd
  }

  public function testDeleteDiscount()
  {
    $planID = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($planID);

    $couponID = '25off-' . self::randomString();
    self::retrieveOrCreateCoupon($couponID);

    $customer = self::createTestCustomer();

    $sub = $customer->subscriptions->create(
        array(
            'plan' => $planID,
            'coupon' => $couponID
        )
    );

    $this->assertSame($sub->status, 'active');
    $this->assertSame($sub->plan->id, $planID);
    $this->assertSame($sub->discount->coupon->id, $couponID);

    $sub->deleteDiscount();
    $sub = $customer->subscriptions->retrieve($sub->id);
    $this->assertNull($sub->discount);
  }
}
