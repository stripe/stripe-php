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
        $this->assertInstanceOf("Stripe\\SKU", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\SKU", $resource);
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
        $this->assertInstanceOf("Stripe\\SKU", $resource);
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
        $this->assertInstanceOf("Stripe\\SKU", $resource);
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
        $this->assertInstanceOf("Stripe\\SKU", $resource);
    }

    public function testIsDeletable()
    {
        $resource = SKU::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/skus/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertInstanceOf("Stripe\\SKU", $resource);
    }
}
