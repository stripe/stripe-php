<?php

class Stripe_ChargeTest extends UnitTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Stripe_Charge::classUrl('Stripe_Charge'), '/charges');
    $charge = new Stripe_Charge('abcd/efgh');
    $this->assertEqual($charge->instanceUrl(), '/charges/abcd%2Fefgh');
  }

  public function testCreate()
  {
    authorizeFromEnv();
    $c = Stripe_Charge::create(array('amount' => 100,
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
    $c = Stripe_Charge::create(array('amount' => 100,
				    'currency' => 'usd',
				    'card' => array('number' => '4242424242424242',
						    'exp_month' => 5,
						    'exp_year' => 2015)));
    $d = Stripe_Charge::retrieve($c->id);
    $this->assertEqual($d->id, $c->id);
  }
}
