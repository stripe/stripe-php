<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\EphemeralKeyService
 */
final class EphemeralKeyServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ek_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var EphemeralKeyService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new EphemeralKeyService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/ephemeral_keys',
            null,
            ['Stripe-Version: 2017-05-25']
        );
        $resource = $this->service->create([
            'customer' => 'cus_123',
        ], ['stripe_version' => '2017-05-25']);
        static::assertInstanceOf(\Stripe\EphemeralKey::class, $resource);
    }

    public function testCreateWithoutExplicitApiVersion()
    {
        $this->expectException(\InvalidArgumentException::class);

        $resource = $this->service->create([
            'customer' => 'cus_123',
        ]);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/ephemeral_keys/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\EphemeralKey::class, $resource);
    }
}
