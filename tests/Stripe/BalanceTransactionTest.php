<?php

namespace Stripe;

class BalanceTransactionTest extends TestCase
{
    const TEST_RESOURCE_ID = 'txn_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance_transactions'
        );
        $resources = BalanceTransaction::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\BalanceTransaction::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance_transactions/' . self::TEST_RESOURCE_ID
        );
        $resource = BalanceTransaction::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\BalanceTransaction::class, $resource);
    }
}
