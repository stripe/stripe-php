<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\EventService
 */
final class EventServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'evt_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var EventService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new EventService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/events'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Event::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/events/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Event::class, $resource);
    }
}
