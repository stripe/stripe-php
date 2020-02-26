<?php

namespace Stripe\Service\Issuing;

/**
 * @internal
 * @covers \Stripe\Service\Issuing\CardholderService
 */
final class CardholderServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ich_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var CardholderService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new CardholderService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cardholders'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $params = [
            'billing' => [
                'address' => [
                    'city' => 'city',
                    'country' => 'US',
                    'line1' => 'line1',
                    'postal_code' => 'postal_code',
                ],
            ],
            'name' => 'Cardholder Name',
            'type' => 'individual',
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/cardholders',
            $params
        );
        $resource = $this->service->create($params);
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cardholders/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cardholders/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Issuing\Cardholder::class, $resource);
    }
}
