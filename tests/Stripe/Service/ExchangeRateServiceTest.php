<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\ExchangeRateService
 */
final class ExchangeRateServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ExchangeRateService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new ExchangeRateService($this->client);
    }

    public function testAll()
    {
        $listRates = $this->service->all();
        static::assertInternalType('array', $listRates->data);
        static::assertSame('exchange_rate', $listRates->data[0]->object);
    }

    public function testRetrieve()
    {
        $rates = $this->service->retrieve('usd');
        static::assertSame('exchange_rate', $rates->object);
    }
}
