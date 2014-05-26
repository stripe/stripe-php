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

  public function testCancel()
  {
    $this->expectException(new IsAExpectation('Stripe_InvalidRequestError'));
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

    $reloaded->cancel();
  }

  public function testTransferUpdateMetadata()
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

    $transfer->metadata['test'] = 'foo bar';
    $transfer->save();

    $updatedTransfer = Stripe_Transfer::retrieve($transfer->id);
    $this->assertEqual('foo bar', $updatedTransfer->metadata['test']);
  }

  public function testTransferUpdateMetadataAll()
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

    $transfer->metadata = array('test' => 'foo bar');
    $transfer->save();

    $updatedTransfer = Stripe_Transfer::retrieve($transfer->id);
    $this->assertEqual('foo bar', $updatedTransfer->metadata['test']);
  }

  public function testRecipientUpdateMetadata()
  {
    $recipient = self::createTestRecipient();

    $recipient->metadata['test'] = 'foo bar';
    $recipient->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual('foo bar', $updatedRecipient->metadata['test']);
  }

  public function testRecipientUpdateMetadataAll()
  {
    $recipient = self::createTestRecipient();

    $recipient->metadata = array('test' => 'foo bar');
    $recipient->save();

    $updatedRecipient = Stripe_Recipient::retrieve($recipient->id);
    $this->assertEqual('foo bar', $updatedRecipient->metadata['test']);
  }
}
