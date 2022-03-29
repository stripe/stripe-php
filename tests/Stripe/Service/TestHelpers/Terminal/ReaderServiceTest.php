<?php

namespace Stripe\Service\TestHelpers\Terminal;

/**
 * @internal
 * @covers \Stripe\Service\TestHelpers\Terminal\ReaderService
 */
final class ReaderServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'tml_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ReaderService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ReaderService($this->client);
    }

    public function testPresentPaymentMethod()
    {
        $this->expectsRequest(
            'post',
            '/v1/test_helpers/terminal/readers/' . self::TEST_RESOURCE_ID . '/present_payment_method'
        );
        $resource = $this->service->presentPaymentMethod(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Terminal\Reader::class, $resource);
    }
}
