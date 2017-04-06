<?php

namespace Stripe;

class TransferTest extends TestCase
{
    // The resource that was traditionally called "transfer" became a "payout"
    // in API version 2017-04-06. We're testing traditional transfers here, so
    // we force the API version just prior anywhere that we need to.
    private $opts = array('stripe_version' => '2017-02-14');

    public function testCreate()
    {
        $recipient = self::createTestRecipient();

        self::authorizeFromEnv();
        $transfer = Transfer::create(array(
            'amount' => 100,
            'currency' => 'usd',
            'recipient' => $recipient->id
        ), $this->opts);
        $this->assertSame('pending', $transfer->status);
    }

    public function testRetrieve()
    {
        $recipient = self::createTestRecipient();

        self::authorizeFromEnv();
        $transfer = Transfer::create(array(
            'amount' => 100,
            'currency' => 'usd',
            'recipient' => $recipient->id
        ), $this->opts);
        $reloaded = Transfer::retrieve($transfer->id, $this->opts);
        $this->assertSame($reloaded->id, $transfer->id);
    }

    /**
     * @expectedException Stripe\Error\InvalidRequest
     */
    public function testCancel()
    {
        $recipient = self::createTestRecipient();

        self::authorizeFromEnv();
        $transfer = Transfer::create(array(
            'amount' => 100,
            'currency' => 'usd',
            'recipient' => $recipient->id
        ), $this->opts);
        $reloaded = Transfer::retrieve($transfer->id, $this->opts);
        $this->assertSame($reloaded->id, $transfer->id);

        $reloaded->cancel();
    }

    public function testTransferUpdateMetadata()
    {
        $recipient = self::createTestRecipient();

        self::authorizeFromEnv();
        $transfer = Transfer::create(array(
            'amount' => 100,
            'currency' => 'usd',
            'recipient' => $recipient->id
        ), $this->opts);

        $transfer->metadata['test'] = 'foo bar';
        $transfer->save();

        $updatedTransfer = Transfer::retrieve($transfer->id, $this->opts);
        $this->assertSame('foo bar', $updatedTransfer->metadata['test']);
    }

    public function testTransferUpdateMetadataAll()
    {
        $recipient = self::createTestRecipient();

        self::authorizeFromEnv();
        $transfer = Transfer::create(array(
            'amount' => 100,
            'currency' => 'usd',
            'recipient' => $recipient->id
        ), $this->opts);

        $transfer->metadata = array('test' => 'foo bar');
        $transfer->save();

        $updatedTransfer = Transfer::retrieve($transfer->id, $this->opts);
        $this->assertSame('foo bar', $updatedTransfer->metadata['test']);
    }

    public function testRecipientUpdateMetadata()
    {
        $recipient = self::createTestRecipient();

        $recipient->metadata['test'] = 'foo bar';
        $recipient->save();

        $updatedRecipient = Recipient::retrieve($recipient->id);
        $this->assertSame('foo bar', $updatedRecipient->metadata['test']);
    }

    public function testRecipientUpdateMetadataAll()
    {
        $recipient = self::createTestRecipient();

        $recipient->metadata = array('test' => 'foo bar');
        $recipient->save();

        $updatedRecipient = Recipient::retrieve($recipient->id);
        $this->assertSame('foo bar', $updatedRecipient->metadata['test']);
    }
}
