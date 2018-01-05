<?php

namespace Stripe;

class SubscriptionTest extends TestCase
{
    const TEST_RESOURCE_ID = 'sub_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscriptions'
        );
        $resources = Subscription::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Subscription", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscriptions/' . self::TEST_RESOURCE_ID
        );
        $resource = Subscription::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscriptions'
        );
        $resource = Subscription::create(array(
            "customer" => "cus_123",
            "plan" => "plan"
        ));
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
    }

    public function testIsSaveable()
    {
        $resource = Subscription::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/subscriptions/' . $resource->id
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscriptions/' . self::TEST_RESOURCE_ID
        );
        $resource = Subscription::update(self::TEST_RESOURCE_ID, array(
            "metadata" => array("key" => "value"),
        ));
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
    }

    public function testIsCancelable()
    {
        $resource = Subscription::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/subscriptions/' . $resource->id
        );
        $resource->cancel();
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
    }

    public function testCanDeleteDiscount()
    {
        $resource = Subscription::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/subscriptions/' . $resource->id . '/discount'
        );
        $resource->deleteDiscount();
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
    }
}
