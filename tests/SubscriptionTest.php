<?php

namespace Stripe;

class SubscriptionTest extends TestCase
{

    public function testCustomerCreateUpdateListCancel()
    {
        $planID = 'gold-' . self::generateRandomString(20);
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

        $subs = $customer->subscriptions->all(array('limit'=>3));
        $this->assertSame(get_class($subs->data[0]), 'Stripe\Subscription');

        $sub->cancel(array('at_period_end' => true));

        $sub = $customer->subscriptions->retrieve($sub->id);
        $this->assertSame($sub->status, 'active');
        // @codingStandardsIgnoreStart
        $this->assertTrue($sub->cancel_at_period_end);
        // @codingStandardsIgnoreEnd
    }

    public function testCreateUpdateListCancel()
    {
        $planID = 'gold-' . self::generateRandomString(20);
        self::retrieveOrCreatePlan($planID);

        $customer = self::createTestCustomer();

        $sub = Subscription::create(array('plan' => $planID, 'customer' => $customer->id));

        $this->assertSame($sub->status, 'active');
        $this->assertSame($sub->plan->id, $planID);

        $sub->quantity = 2;
        $sub->save();

        $sub = Subscription::retrieve($sub->id);
        $this->assertSame($sub->status, 'active');
        $this->assertSame($sub->plan->id, $planID);
        $this->assertSame($sub->quantity, 2);

        $subs = Subscription::all(array('customer'=>$customer->id, 'plan'=>$planID, 'limit'=>3));
        $this->assertSame(get_class($subs->data[0]), 'Stripe\Subscription');

        $sub->cancel(array('at_period_end' => true));

        $sub = Subscription::retrieve($sub->id);
        $this->assertSame($sub->status, 'active');
        $this->assertTrue($sub->cancel_at_period_end);
    }

    public function testDeleteDiscount()
    {
        $planID = 'gold-' . self::generateRandomString(20);
        self::retrieveOrCreatePlan($planID);

        $couponID = '25off-' . self::generateRandomString(20);
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
