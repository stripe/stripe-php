<?php

class Stripe_ChargeTest extends StripeTestCase
{
  public function testUrls()
  {
    $this->assertEqual(Stripe_Charge::classUrl('Stripe_Charge'), '/v1/charges');
    $charge = new Stripe_Charge('abcd/efgh');
    $this->assertEqual($charge->instanceUrl(), '/v1/charges/abcd%2Fefgh');
  }

  public function testCreate()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4242424242424242',
      'exp_month' => 5,
      'exp_year' => 2015
    );

    $c = Stripe_Charge::create(
        array(
          'amount' => 100,
          'currency' => 'usd',
          'card' => $card
        )
    );
    $this->assertTrue($c->paid);
    $this->assertFalse($c->refunded);
  }

  public function testIdempotentCreate()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4242424242424242',
      'exp_month' => 5,
      'exp_year' => 2015
    );

    $c = Stripe_Charge::create(
        array(
          'amount' => 100,
          'currency' => 'usd',
          'card' => $card
        ),
        array(
          'idempotency_key' => $this->generateRandomString(),
        )
    );

    $this->assertTrue($c->paid);
    $this->assertFalse($c->refunded);
  }


  public function testRetrieve()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4242424242424242',
      'exp_month' => 5,
      'exp_year' => 2015
    );

    $c = Stripe_Charge::create(
        array(
            'amount' => 100,
            'currency' => 'usd',
            'card' => $card
        )
    );
    $d = Stripe_Charge::retrieve($c->id);
    $this->assertEqual($d->id, $c->id);
  }

  public function testUpdateMetadata()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4242424242424242',
      'exp_month' => 5,
      'exp_year' => 2015
    );

    $charge = Stripe_Charge::create(
        array(
            'amount' => 100,
            'currency' => 'usd',
            'card' => $card
        )
    );

    $charge->metadata['test'] = 'foo bar';
    $charge->save();

    $updatedCharge = Stripe_Charge::retrieve($charge->id);
    $this->assertEqual('foo bar', $updatedCharge->metadata['test']);
  }

  public function testUpdateMetadataAll()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4242424242424242',
      'exp_month' => 5,
      'exp_year' => 2015
    );

    $charge = Stripe_Charge::create(
        array(
            'amount' => 100,
            'currency' => 'usd',
            'card' => $card
        )
    );

    $charge->metadata = array('test' => 'foo bar');
    $charge->save();

    $updatedCharge = Stripe_Charge::retrieve($charge->id);
    $this->assertEqual('foo bar', $updatedCharge->metadata['test']);
  }

  public function testMarkAsFraudulent()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4242424242424242',
      'exp_month' => 5,
      'exp_year' => 2015
    );

    $charge = Stripe_Charge::create(
        array(
            'amount' => 100,
            'currency' => 'usd',
            'card' => $card
        )
    );

    $charge->refunds->create();
    $charge->markAsFraudulent();

    $updatedCharge = Stripe_Charge::retrieve($charge->id);
    $this->assertEqual(
        'fraudulent', $updatedCharge['fraud_details']['user_report']
    );
  }

  public function testCreateWithBitcoinReceiverSource()
  {
    self::authorizeFromEnv();

    $receiver = $this->createTestBitcoinReceiver("do+fill_now@stripe.com");

    $charge = Stripe_Charge::create(
        array(
          'amount' => 100,
          'currency' => 'usd',
          'source' => $receiver->id
        )
    );

    $this->assertEqual($receiver->id, $charge->source->id);
    $this->assertEqual("bitcoin_receiver", $charge->source->object);
    $this->assertEqual("paid", $charge->status);
    $this->assertTrue(get_class($charge->source) == 'Stripe_BitcoinReceiver');
  }

  public function markAsSafe()
  {
    self::authorizeFromEnv();

    $card = array(
      'number' => '4242424242424242',
      'exp_month' => 5,
      'exp_year' => 2015
    );

    $charge = Stripe_Charge::create(
        array(
            'amount' => 100,
            'currency' => 'usd',
            'card' => $card
        )
    );

    $charge->markAsSafe();

    $updatedCharge = Stripe_Charge::retrieve($charge->id);
    $this->assertEqual('safe', $updatedCharge['fraud_details']['user_report']);
  }
}
