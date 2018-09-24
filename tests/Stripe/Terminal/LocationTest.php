<?php

namespace Stripe\Terminal;

class LocationTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'loc_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/terminal/locations'
        );
        $resources = Location::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Terminal\\Location", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/terminal/locations/' . self::TEST_RESOURCE_ID
        );
        $resource = Location::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Terminal\\Location", $resource);
    }

    public function testIsSaveable()
    {
        $resource = Location::retrieve(self::TEST_RESOURCE_ID);
        $resource->display_name = "new-name";

        $this->expectsRequest(
            'post',
            '/v1/terminal/locations/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Terminal\\Location", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/locations/' . self::TEST_RESOURCE_ID,
            ["display_name" => "new-name"]
        );
        $resource = Location::update(self::TEST_RESOURCE_ID, [
            "display_name" => "new-name",
        ]);
        $this->assertInstanceOf("Stripe\\Terminal\\Location", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/locations',
            [
                "display_name" => "name",
                "address" => [
                    "line1" => "line1",
                    "country" => "US",
                    "state" => "CA",
                    "postal_code" => "12345",
                    "city" => "San Francisco"
                ]
            ]
        );
        $resource = Location::create([
            "display_name" => "name",
            "address" => [
                "line1" => "line1",
                "country" => "US",
                "state" => "CA",
                "postal_code" => "12345",
                "city" => "San Francisco"
            ]
        ]);
        $this->assertInstanceOf("Stripe\\Terminal\\Location", $resource);
    }
}
