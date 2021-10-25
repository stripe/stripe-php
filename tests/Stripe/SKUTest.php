<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\SKU
 */
final class SKUTest extends \Stripe\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'sku_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/skus'
        );
        $resources = SKU::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\SKU::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\SKU::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/skus'
        );
        $resource = SKU::create([
            'currency' => 'usd',
            'inventory' => [
                'type' => 'finite',
                'quantity' => 1,
            ],
            'price' => 100,
            'product' => 'prod_123',
        ]);
        static::assertInstanceOf(\Stripe\SKU::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/skus/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\SKU::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource = SKU::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\SKU::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/skus/' . $resource->id
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\SKU::class, $resource);
    }
}
