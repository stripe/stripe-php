<?php

namespace Stripe;

class SubscriptionItemTest extends TestCase
{

    public function testCreateUpdateRetrieveListCancel()
    {
        $planID = 'gold-' . self::generateRandomString(20);
        self::retrieveOrCreatePlan($planID);

        $customer = self::createTestCustomer();
        $sub = Subscription::create(array('plan' => $planID, 'customer' => $customer->id));

        $subItem = SubscriptionItem::create(array('plan' => $planID, 'subscription' => $sub->id));

        $this->assertSame($subItem->plan->id, $planID);

        $subItem->quantity = 2;
        $subItem->save();

        $subItem = SubscriptionItem::retrieve($subItem->id);
        $this->assertSame($subItem->quantity, 2);

        // Update the quantity parameter one more time
        $subItem = SubscriptionItem::update($subItem->id, array('quantity' => 3));
        $this->assertSame($subItem->quantity, 3);

        $subItems = SubscriptionItem::all(array('subscription'=>$sub->id, 'limit'=>3));
        $this->assertSame(get_class($subItems->data[0]), 'Stripe\SubscriptionItem');
        $this->assertSame(2, count($subItems->data));

        $subItem->delete();
        $this->assertTrue($subItem->deleted);
    }
}
