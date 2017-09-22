<?php

namespace Stripe;

class SourceTransactionTest extends TestCase
{
    public function testList()
    {
        $this->mockRequest(
            'GET',
            '/v1/sources/src_foo/source_transactions',
            array(),
            array(
                'object' => 'list',
                'url' => '/v1/sources/src_foo/source_transactions',
                'data' => array(
                    array(
                        'id' => 'srctxn_bar',
                        'object' => 'source_transaction',
                    ),
                ),
                'has_more' => false,
            )
        );

        $source = \Stripe\Source::constructFrom(
            array('id' => 'src_foo', 'object' => 'source'),
            new \Stripe\Util\RequestOptions()
        );

        $transactions = $source->sourceTransactions();

        $this->assertTrue(is_array($transactions->data));
        $this->assertSame('source_transaction', $transactions->data[0]->object);
    }
}
