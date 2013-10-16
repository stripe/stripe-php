<?php

class Stripe_TransferTest extends StripeTestCase
{
  public function testCreate()
  {
    $recipient = self::createTestRecipient();

    authorizeFromEnv();
    $transfer = Stripe_Transfer::create(
      array(
        'amount' => 100,
				'currency' => 'usd',
        'recipient' => $recipient->id
      )
    );
    $this->assertEqual('pending', $transfer->status);
  }

  public function testRetrieve()
  {
    $recipient = self::createTestRecipient();

    authorizeFromEnv();
    $transfer = Stripe_Transfer::create(
      array(
        'amount' => 100,
				'currency' => 'usd',
        'recipient' => $recipient->id
      )
    );
    $reloaded = Stripe_Transfer::retrieve($transfer->id);
    $this->assertEqual($reloaded->id, $transfer->id);
  }
}
