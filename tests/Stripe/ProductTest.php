<?php

namespace Stripe;

class ProductTest extends TestCase
{
    const TEST_RESOURCE_ID = 'prod_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/products'
        );
        $resources = Product::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\Product", get_class($resources->data[0]));
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/products/' . self::TEST_RESOURCE_ID
        );
        $resource = Product::retrieve(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\Product", get_class($resource));
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/products'
        );
        $resource = Product::create(array(
            'name' => 'name'
        ));
        $this->assertSame("Stripe\\Product", get_class($resource));
    }

    public function testIsSaveable()
    {
        $resource = Product::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/products/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertSame("Stripe\\Product", get_class($resource));
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/products/' . self::TEST_RESOURCE_ID
        );
        $resource = Product::update(self::TEST_RESOURCE_ID, array(
            "metadata" => array("key" => "value"),
        ));
        $this->assertSame("Stripe\\Product", get_class($resource));
    }

    public function testIsDeletable()
    {
        $resource = Product::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/products/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertSame("Stripe\\Product", get_class($resource));
    }
}
