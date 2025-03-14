<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\BalanceTransaction
 */
final class BalanceTransactionTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'txn_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance_transactions'
        );
        $resources = BalanceTransaction::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(BalanceTransaction::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance_transactions/' . self::TEST_RESOURCE_ID
        );
        $resource = BalanceTransaction::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(BalanceTransaction::class, $resource);
    }
}
