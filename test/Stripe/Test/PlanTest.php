<?php
namespace Stripe\Test;

use Stripe\Plan;

class PlanTest extends \UnitTestCase
{
  public function testDeletion()
  {
    authorizeFromEnv();
    $p = Plan::create(array('amount' => 2000,
				       'currency' => 'usd',
				       'name' => 'Plan',
				       'id' => 'gold'));
    $p->delete();
    $this->assertTrue($p->deleted);
  }

  public function testSave()
  {
    authorizeFromEnv();
    $p = Plan::create(array('amount' => 2000,
				       'currency' => 'usd',
				       'name' => 'Plan',
				       'id' => 'gold'));
    $p->name = 'A new plan name';
    $p->bogus = 'bogus';
    $p->save();
    $this->assertEqual($p->name, 'A new plan name');
    $this->assertNull($p['bogus']);

    $p2 = Plan::retrieve($p->'gold');
    $this->assertEqual($c->name, $c2->name);
  }
}
