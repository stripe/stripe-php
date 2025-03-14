<?php

namespace Stripe\Service;

/**
 * @internal
 *
 * @covers \Stripe\Service\CoreServiceFactory
 */
final class CoreServiceFactoryTest extends \Stripe\TestCase
{
    /** @var \Stripe\StripeClient */
    private $client;

    /** @var CoreServiceFactory */
    private $serviceFactory;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->serviceFactory = new CoreServiceFactory($this->client);
    }

    public function testExposesPropertiesForServices()
    {
        self::assertInstanceOf(CouponService::class, $this->serviceFactory->coupons);
        self::assertInstanceOf(Issuing\IssuingServiceFactory::class, $this->serviceFactory->issuing);
    }

    public function testMultipleCallsReturnSameInstance()
    {
        $service = $this->serviceFactory->coupons;
        self::assertSame($service, $this->serviceFactory->coupons);
    }
}
