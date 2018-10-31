<?php

namespace Stripe\Radar;

class ValueListItemTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'rsli_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_list_items'
        );
        $resources = ValueListItem::all([
            "value_list" => "rsl_123",
        ]);
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Radar\\ValueListItem", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_list_items/' . self::TEST_RESOURCE_ID
        );
        $resource = ValueListItem::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Radar\\ValueListItem", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/value_list_items'
        );
        $resource = ValueListItem::create([
            "value_list" => "rsl_123",
            "value" => "value",
        ]);
        $this->assertInstanceOf("Stripe\\Radar\\ValueListItem", $resource);
    }

    public function testIsDeletable()
    {
        $resource = ValueListItem::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/radar/value_list_items/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertInstanceOf("Stripe\\Radar\\ValueListItem", $resource);
    }
}
