<?php

namespace Stripe\Service\BillingPortal;

/**
 * @internal
 * @covers \Stripe\Service\BillingPortal\SessionService
 */
final class SessionServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'cs_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var SessionService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new SessionService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/billing_portal/sessions'
        );
        $resource = $this->service->create([
            'customer' => 'cus_123',
            'return_url' => 'https://stripe.com/return',
        ]);
        static::assertInstanceOf(\Stripe\BillingPortal\Session::class, $resource);
    }
}
