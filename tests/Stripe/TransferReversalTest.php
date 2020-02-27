<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\TransferReversal
 */
final class TransferReversalTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'trr_123';
    const TEST_TRANSFER_ID = 'tr_123';

    public function testIsSaveable()
    {
        $resource = Transfer::retrieveReversal(self::TEST_TRANSFER_ID, self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/transfers/' . $resource->transfer . '/reversals/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\TransferReversal::class, $resource);
    }
}
