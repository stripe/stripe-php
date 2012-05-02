<?php
namespace Stripe\Test;

use Stripe\Charge;

class ChargeTest extends \UnitTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Charge::classUrl('Stripe_Charge'), '/charges');
    $charge = new Charge('abcd/efgh');
    $this->assertEqual($charge->instanceUrl(), '/charges/abcd%2Fefgh');
  }

  public function testCreate()
  {
    authorizeFromEnv();
    $c = Charge::create(array('amount' => 100,
				    'currency' => 'usd',
				    'card' => array('number' => '4242424242424242',
						    'exp_month' => 5,
						    'exp_year' => 2015)));
    $this->assertTrue($c->paid);
    $this->assertFalse($c->refunded);
  }

  public function testRetrieve()
  {
    authorizeFromEnv();
    $c = Charge::create(array('amount' => 100,
				    'currency' => 'usd',
				    'card' => array('number' => '4242424242424242',
						    'exp_month' => 5,
						    'exp_year' => 2015)));
    $d = Charge::retrieve($c->id);
    $this->assertEqual($d->id, $c->id);
  }
}
