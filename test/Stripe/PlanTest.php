<?php

class Stripe_PlanTest extends StripeTestCase
{
  public function testDeletion()
  {
    authorizeFromEnv();
    $p = Stripe_Plan::create(array('amount' => 2000,
                                   'interval' => 'month',
                                   'currency' => 'usd',
                                   'name' => 'Plan',
                                   'id' => 'gold-' . self::randomString()));
    $p->delete();
    $this->assertTrue($p->deleted);
  }

  public function testId()
  {
    authorizeFromEnv();
    $p = Stripe_Plan::create(array('amount' => 2000,
                                   'interval' => 'month',
                                   'currency' => 'usd',
                                   'name' => 'Plan',
                                   'id' => '0'));
    $p2 = Stripe_Plan::retrieve('0');

    $this->assertEqual($p->id, $p2->id);
    $this->assertEqual($p->id, '0');
    $p->delete();
  }

  public function testSave()
  {
    authorizeFromEnv();
    $planId = 'gold-' . self::randomString();
    $p = Stripe_Plan::create(array('amount' => 2000,
                                   'interval' => 'month',
                                   'currency' => 'usd',
                                   'name' => 'Plan',
                                   'id' => $planId));
    $p->name = 'A new plan name';
    $p->save();
    $this->assertEqual($p->name, 'A new plan name');

    $p2 = Stripe_Plan::retrieve($planId);
    $this->assertEqual($p->name, $p2->name);
  }
}
