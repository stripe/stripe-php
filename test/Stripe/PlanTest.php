<?php

class Stripe_PlanTest extends UnitTestCase
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
    $p->bogus = 'bogus';
    $p->save();
    $this->assertEqual($p->name, 'A new plan name');
    $this->assertNull($p['bogus']);

    $p2 = Stripe_Plan::retrieve($planId);
    $this->assertEqual($c->name, $c2->name);
  }
}
