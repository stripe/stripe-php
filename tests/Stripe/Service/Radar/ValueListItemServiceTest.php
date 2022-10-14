<?php

namespace Stripe\Service\Radar;

/**
 * @internal
 * @covers \Stripe\Service\Radar\ValueListItemService
 */
final class ValueListItemServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'rsli_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var ValueListItemService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ValueListItemService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_list_items'
        );
        $resources = $this->service->all([
            'value_list' => 'rsl_123',
        ]);
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/value_list_items'
        );
        $resource = $this->service->create([
            'value_list' => 'rsl_123',
            'value' => 'value',
        ]);
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/radar/value_list_items/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $resource);
        static::assertTrue($resource->isDeleted());
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_list_items/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Radar\ValueListItem::class, $resource);
    }
}
