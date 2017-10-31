<?php

namespace Stripe;

class ExchangeRateTest extends TestCase
{
    public function testRetrieve()
    {
        $this->mockRequest(
            'GET',
            '/v1/exchange_rates/usd',
            array(),
            array(
                'id' => 'usd',
                'object' => 'exchange_rate',
                'rates' => array('eur' => 0.845876),
            )
        );

        $currency = "usd";
        $rates = ExchangeRate::retrieve($currency);
        $this->assertEquals('exchange_rate', $rates->object);
    }

    public function testList()
    {
        $this->mockRequest(
            'GET',
            '/v1/exchange_rates',
            array(),
            array(
                'object' => 'list',
                'data' => array(
                    array(
                        'id' => 'eur',
                        'object' => 'exchange_rate',
                        'rates' => array('usd' => 1.18221),
                    ),
                    array(
                        'id' => 'usd',
                        'object' => 'exchange_rate',
                        'rates' => array('eur' => 0.845876),
                    ),
                ),
            )
        );

        $listRates = ExchangeRate::all();
        $this->assertTrue(is_array($listRates->data));
        $this->assertEquals('exchange_rate', $listRates->data[0]->object);
    }
}
