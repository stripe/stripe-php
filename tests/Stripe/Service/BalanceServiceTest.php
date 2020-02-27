<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\BalanceService
 */
final class BalanceServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var BalanceService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new BalanceService($this->client);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance'
        );
        $resource = $this->service->retrieve();
        static::assertInstanceOf(\Stripe\Balance::class, $resource);
    }
}
