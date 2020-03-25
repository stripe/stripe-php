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
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ExchangeRateService($this->client);
    }

    public function testAll()
    {
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\ExchangeRate::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $resource = $this->service->retrieve('usd');
        static::assertInstanceOf(\Stripe\ExchangeRate::class, $resource);
    }
}
