<?php

namespace Stripe;

class FileLinkTest extends TestCase
{
    const TEST_RESOURCE_ID = 'link_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links'
        );
        $resources = FileLink::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\FileLink", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = FileLink::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\FileLink", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links'
        );
        $resource = FileLink::create([
            "file" => "file_123"
        ]);
        $this->assertInstanceOf("Stripe\\FileLink", $resource);
    }

    public function testIsSaveable()
    {
        $resource = FileLink::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/file_links/' . $resource->id
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\FileLink", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = FileLink::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\FileLink", $resource);
    }
}
