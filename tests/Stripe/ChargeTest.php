<?php

namespace Stripe;

class ChargeTest extends TestCase
{
    const TEST_RESOURCE_ID = 'ch_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/charges'
        );
        $resources = Charge::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Charge::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/charges/' . self::TEST_RESOURCE_ID
        );
        $resource = Charge::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Charge::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/charges'
        );
        $resource = Charge::create([
            "amount" => 100,
            "currency" => "usd",
            "source" => "tok_123"
        ]);
        $this->assertInstanceOf(\Stripe\Charge::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Charge::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/charges/' . $resource->id
        );
        $resource->save();
        $this->assertInstanceOf(\Stripe\Charge::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/charges/' . self::TEST_RESOURCE_ID
        );
        $resource = Charge::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf(\Stripe\Charge::class, $resource);
    }

    public function testCanCapture()
    {
        $charge = Charge::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/charges/' . $charge->id . '/capture'
        );
        $resource = $charge->capture();
        $this->assertInstanceOf(\Stripe\Charge::class, $resource);
        $this->assertSame($resource, $charge);
    }
}
