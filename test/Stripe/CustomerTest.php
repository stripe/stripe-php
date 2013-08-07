<?php

class Stripe_CustomerTest extends StripeTestCase
{
  public function testDeletion()
  {
    $customer = self::createTestCustomer();
    $customer->delete();

    $this->assertTrue($customer->deleted);
    $this->assertNull($customer['active_card']);
  }

  public function testSave()
  {
    $customer = self::createTestCustomer();

    $customer->email = 'gdb@stripe.com';
    $customer->save();
    $this->assertEqual($customer->email, 'gdb@stripe.com');

    $customer2 = Stripe_Customer::retrieve($customer->id);
    $this->assertEqual($customer->email, $customer2->email);
  }

  public function testBogusAttribute()
  {
    $customer = self::createTestCustomer();
    $customer->bogus = 'bogus';
    $this->expectException(new IsAExpectation('Stripe_InvalidRequestError'));
    $customer->save();
  }

  public function testUpdateDescriptionEmpty()
  {
    $customer = self::createTestCustomer();

    $this->expectException(new IsAExpectation('InvalidArgumentException'));

    $customer->description = '';
  }

  public function testUpdateDescriptionNull()
  {
    $customer = self::createTestCustomer(array('description' => 'foo bar'));
    $customer->description = NULL;

    $customer->save();

    $updatedCustomer = Stripe_Customer::retrieve($customer->id);
    $this->assertEqual(NULL, $updatedCustomer->description);
  }

  public function testCancelSubscription()
  {
    $plan_id = 'gold-' . self::randomString();
    self::retrieveOrCreatePlan($plan_id);

    $customer = self::createTestCustomer(
      array(
        'plan' => $plan_id,
      ));

    $customer->cancelSubscription(array('at_period_end' => true));
    $this->assertEqual($customer->subscription->status, 'active');
    $this->assertTrue($customer->subscription->cancel_at_period_end);
    $customer->cancelSubscription();
    $this->assertEqual($customer->subscription->status, 'canceled');
  }

}
