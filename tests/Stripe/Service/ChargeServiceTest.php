<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\ChargeService
 */
final class ChargeServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ch_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ChargeService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ChargeService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/charges'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Charge::class, $resources->data[0]);
    }

    public function testSearch()
    {
        $this->expectsRequest(
            'get',
            '/v1/charges/search'
        );
        $resources = $this->service->search(['query' => 'currency:"USD"']);
        static::compatAssertIsArray($resources->data);
        static::assertSame(1, $resources->total_count);
        static::assertInstanceOf(\Stripe\Charge::class, $resources->data[0]);
    }

    public function testCapture()
    {
        $this->expectsRequest(
            'post',
            '/v1/charges/' . self::TEST_RESOURCE_ID . '/capture'
        );
        $resource = $this->service->capture(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Charge::class, $resource);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/charges'
        );
        $resource = $this->service->create([
            'amount' => 100,
            'currency' => 'usd',
            'source' => 'tok_123',
        ]);
        static::assertInstanceOf(\Stripe\Charge::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/charges/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Charge::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/charges/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Charge::class, $resource);
    }
}
