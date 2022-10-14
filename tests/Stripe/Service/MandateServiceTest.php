<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\MandateService
 */
final class MandateServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'mandate_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var MandateService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new MandateService($this->client);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/mandates/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Mandate::class, $resource);
    }
}
