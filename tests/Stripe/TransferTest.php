<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Transfer
 */
final class TransferTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'tr_123';
    const TEST_REVERSAL_ID = 'trr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/transfers'
        );
        $resources = Transfer::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Transfer::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/transfers/' . self::TEST_RESOURCE_ID
        );
        $resource = Transfer::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Transfer::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/transfers'
        );
        $resource = Transfer::create([
            'amount' => 100,
            'currency' => 'usd',
            'destination' => 'acct_123',
        ]);
        self::assertInstanceOf(Transfer::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Transfer::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/transfers/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(Transfer::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/transfers/' . self::TEST_RESOURCE_ID
        );
        $resource = Transfer::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Transfer::class, $resource);
    }

    public function testCanCreateReversal()
    {
        $this->expectsRequest(
            'post',
            '/v1/transfers/' . self::TEST_RESOURCE_ID . '/reversals'
        );
        $resource = Transfer::createReversal(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(TransferReversal::class, $resource);
    }

    public function testCanRetrieveReversal()
    {
        $this->expectsRequest(
            'get',
            '/v1/transfers/' . self::TEST_RESOURCE_ID . '/reversals/' . self::TEST_REVERSAL_ID
        );
        $resource = Transfer::retrieveReversal(self::TEST_RESOURCE_ID, self::TEST_REVERSAL_ID);
        self::assertInstanceOf(TransferReversal::class, $resource);
    }

    public function testCanUpdateReversal()
    {
        $this->expectsRequest(
            'post',
            '/v1/transfers/' . self::TEST_RESOURCE_ID . '/reversals/' . self::TEST_REVERSAL_ID
        );
        $resource = Transfer::updateReversal(
            self::TEST_RESOURCE_ID,
            self::TEST_REVERSAL_ID,
            [
                'metadata' => ['key' => 'value'],
            ]
        );
        self::assertInstanceOf(TransferReversal::class, $resource);
    }

    public function testCanListReversal()
    {
        $this->expectsRequest(
            'get',
            '/v1/transfers/' . self::TEST_RESOURCE_ID . '/reversals'
        );
        $resources = Transfer::allReversals(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(TransferReversal::class, $resources->data[0]);
    }
}
