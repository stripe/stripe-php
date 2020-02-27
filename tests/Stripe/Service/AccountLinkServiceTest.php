<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\AccountLinkService
 */
final class AccountLinkServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var AccountLinkService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new AccountLinkService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/account_links'
        );
        $resource = $this->service->create([
            'account' => 'acct_123',
            'failure_url' => 'https://stripe.com/failure',
            'success_url' => 'https://stripe.com/success',
            'type' => 'custom_account_verification',
        ]);
        static::assertInstanceOf(\Stripe\AccountLink::class, $resource);
    }
}
