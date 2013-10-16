<?php

class Stripe_ChargeTest extends UnitTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Stripe_Charge::classUrl('Stripe_Charge'), '/v1/charges');
    $charge = new Stripe_Charge('abcd/efgh');
    $this->assertEqual($charge->instanceUrl(), '/v1/charges/abcd%2Fefgh');
  }

  public function testCreate()
  {
    authorizeFromEnv();
    $c = Stripe_Charge::create(
      array(
        'amount' => 100,
        'currency' => 'usd',
        'card' => array(
          'number' => '4242424242424242',
          'exp_month' => 5,
          'exp_year' => 2015
        )
      )
    );
    $this->assertTrue($c->paid);
    $this->assertFalse($c->refunded);
  }

  public function testRetrieve()
  {
    authorizeFromEnv();
    $c = Stripe_Charge::create(
      array(
        'amount' => 100,
        'currency' => 'usd',
        'card' => array(
          'number' => '4242424242424242',
          'exp_month' => 5,
          'exp_year' => 2015
        )
      )
    );
    $d = Stripe_Charge::retrieve($c->id);
    $this->assertEqual($d->id, $c->id);
  }

  public function testUpdateMetadata()
  {
    authorizeFromEnv();
    $charge = Stripe_Charge::create(
      array(
        'amount' => 100,
        'currency' => 'usd',
        'card' => array(
          'number' => '4242424242424242',
          'exp_month' => 5,
          'exp_year' => 2015
        )
      )
    );

    $charge->metadata['test'] = 'foo bar';
    $charge->save();

    $updatedCharge = Stripe_Charge::retrieve($charge->id);
    $this->assertEqual('foo bar', $updatedCharge->metadata['test']);
  }

  public function testUpdateMetadataAll()
  {
    authorizeFromEnv();
    $charge = Stripe_Charge::create(
      array(
        'amount' => 100,
        'currency' => 'usd',
        'card' => array(
          'number' => '4242424242424242',
          'exp_month' => 5,
          'exp_year' => 2015
        )
      )
    );

    $charge->metadata = array('test' => 'foo bar');
    $charge->save();

    $updatedCharge = Stripe_Charge::retrieve($charge->id);
    $this->assertEqual('foo bar', $updatedCharge->metadata['test']);
  }
}
