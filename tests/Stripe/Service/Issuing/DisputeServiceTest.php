<?php

namespace Stripe\Service\Issuing;

/**
 * @internal
 * @covers \Stripe\Service\Issuing\DisputeService
 */
final class DisputeServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'idp_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var DisputeService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new DisputeService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $params = [
            'transaction' => 'ipi_123',
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes',
            $params
        );
        $resource = $this->service->create($params);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testSubmit()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID . '/submit',
            ['metadata' => ['key' => 'value']]
        );
        $resource = $this->service->submit(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Issuing\Dispute::class, $resource);
    }
}
