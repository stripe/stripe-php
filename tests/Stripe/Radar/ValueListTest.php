<?php

namespace Stripe\Radar;

class ValueListTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'rsl_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_lists'
        );
        $resources = ValueList::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_lists/' . self::TEST_RESOURCE_ID
        );
        $resource = ValueList::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/value_lists'
        );
        $resource = ValueList::create([
            "alias" => "alias",
            "name" => "name",
        ]);
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = ValueList::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/radar/value_lists/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/value_lists/' . self::TEST_RESOURCE_ID
        );
        $resource = ValueList::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = ValueList::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/radar/value_lists/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\Radar\ValueList::class, $resource);
    }
}
