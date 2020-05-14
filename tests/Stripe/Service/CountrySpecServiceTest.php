<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\CountrySpecService
 */
final class CountrySpecServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'US';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var CountrySpecService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new CountrySpecService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/country_specs'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\CountrySpec::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/country_specs/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\CountrySpec::class, $resource);
    }
}
