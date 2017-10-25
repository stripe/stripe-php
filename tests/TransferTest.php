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
        $transfer = self::createTestTransfer(array(), $this->opts);
        $this->assertSame('transfer', $transfer->object);
    }

    public function testRetrieve()
    {
        $transfer = self::createTestTransfer(array(), $this->opts);
        $reloaded = Transfer::retrieve($transfer->id, $this->opts);
        $this->assertSame($reloaded->id, $transfer->id);
    }

    public function testTransferUpdateMetadata()
    {
        $transfer = self::createTestTransfer(array(), $this->opts);

        $transfer->metadata['test'] = 'foo bar';
        $transfer->save();

        $updatedTransfer = Transfer::retrieve($transfer->id, $this->opts);
        $this->assertSame('foo bar', $updatedTransfer->metadata['test']);
    }

    public function testTransferUpdateMetadataAll()
    {
        $transfer = self::createTestTransfer(array(), $this->opts);

        $transfer->metadata = array('test' => 'foo bar');
        $transfer->save();

        $updatedTransfer = Transfer::retrieve($transfer->id, $this->opts);
        $this->assertSame('foo bar', $updatedTransfer->metadata['test']);
    }

    public function testStaticCreateReversal()
    {
        $this->mockRequest(
            'POST',
            '/v1/transfers/tr_123/reversals',
            array(),
            array('id' => 'trr_123', 'object' => 'transfer_reversal')
        );

        $reversal = Transfer::createReversal(
            'tr_123'
        );

        $this->assertSame('trr_123', $reversal->id);
        $this->assertSame('transfer_reversal', $reversal->object);
    }

    public function testStaticRetrieveReversal()
    {
        $this->mockRequest(
            'GET',
            '/v1/transfers/tr_123/reversals/trr_123',
            array(),
            array('id' => 'trr_123', 'object' => 'transfer_reversal')
        );

        $reversal = Transfer::retrieveReversal(
            'tr_123',
            'trr_123'
        );

        $this->assertSame('trr_123', $reversal->id);
        $this->assertSame('transfer_reversal', $reversal->object);
    }

    public function testStaticUpdateReversal()
    {
        $this->mockRequest(
            'POST',
            '/v1/transfers/tr_123/reversals/trr_123',
            array('metadata' => array('foo' => 'bar')),
            array('id' => 'trr_123', 'object' => 'transfer_reversal')
        );

        $reversal = Transfer::updateReversal(
            'tr_123',
            'trr_123',
            array('metadata' => array('foo' => 'bar'))
        );

        $this->assertSame('trr_123', $reversal->id);
        $this->assertSame('transfer_reversal', $reversal->object);
    }

    public function testStaticAllReversals()
    {
        $this->mockRequest(
            'GET',
            '/v1/transfers/tr_123/reversals',
            array(),
            array('object' => 'list', 'data' => array())
        );

        $reversals = Transfer::allReversals(
            'tr_123'
        );

        $this->assertSame('list', $reversals->object);
        $this->assertEmpty($reversals->data);
    }
}
