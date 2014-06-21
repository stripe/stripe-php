<?php

class Stripe_PlanTest extends StripeTestCase
{
  public function testDeletion()
  {
    self::authorizeFromEnv();
    $p = Stripe_Plan::create(
        array(
            'amount' => 2000,
            'interval' => 'month',
            'currency' => 'usd',
            'name' => 'Plan',
            'id' => 'gold-' . self::randomString()
        )
    );
    $p->delete();
    $this->assertTrue($p->deleted);
  }

  public function testId()
  {
    self::authorizeFromEnv();
    $id = self::randomString();
    $plan = Stripe_Plan::create(
        array(
            'amount'   => 2000,
            'interval' => 'month',
            'currency' => 'usd',
            'name'     => 'Plan',
            'id'       => $id
        )
    );
    $retrievedPlan = Stripe_Plan::retrieve($id);

    $this->assertEqual($plan->id, $retrievedPlan->id);
    $this->assertEqual($plan->id, $id);

    $plan->delete();
  }

  public function testSave()
  {
    self::authorizeFromEnv();
    $planID = 'gold-' . self::randomString();
    $p = Stripe_Plan::create(
        array(
            'amount'   => 2000,
            'interval' => 'month',
            'currency' => 'usd',
            'name'     => 'Plan',
            'id'       => $planID
        )
    );
    $p->name = 'A new plan name';
    $p->save();
    $this->assertEqual($p->name, 'A new plan name');

    $stripePlan = Stripe_Plan::retrieve($planID);
    $this->assertEqual($p->name, $stripePlan->name);
  }
}
