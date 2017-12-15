<?php

namespace Stripe;

class SKUTest extends TestCase
{
    const TEST_RESOURCE_ID = 'sku_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/skus'
        );
        $resources = SKU::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\SKU", get_class($resources->data[0]));
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\SKU", get_class($resource));
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/skus'
        );
        $resource = SKU::create(array(
            'currency'  => 'usd',
            'inventory' => array(
                'type'     => 'finite',
                'quantity' => 1
            ),
            'price'     => 100,
            'product'   => "prod_123"
        ));
        $this->assertSame("Stripe\\SKU", get_class($resource));
    }

    public function testIsSaveable()
    {
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertSame("Stripe\\SKU", get_class($resource));
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource = SKU::update(self::TEST_RESOURCE_ID, array(
            "metadata" => array("key" => "value"),
        ));
        $this->assertSame("Stripe\\SKU", get_class($resource));
    }

    public function testIsDeletable()
    {
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertSame("Stripe\\SKU", get_class($resource));
    }
}
