<?php
namespace Stripe\Test;

use Stripe\Customer;
use Stripe\InvalidRequestError;

class CustomerTest extends TestCase
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

    $customer2 = Customer::retrieve($customer->id);
    $this->assertEqual($customer->email, $customer2->email);
  }

  public function testBogusAttribute()
  {
    $customer = self::createTestCustomer();
    $customer->bogus = 'bogus';

    $caught = null;
    try {
      $customer->save();
    } catch (InvalidRequestError $exception) {
      $caught = $exception;
    }

    $this->assertTrue($caught instanceof InvalidRequestError);
  }

  public function testCancelSubscription()
  {
    $plan_id = 'gold';
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
