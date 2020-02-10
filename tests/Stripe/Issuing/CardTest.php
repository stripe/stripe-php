<?php

namespace Stripe\Issuing;

class CardTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'ic_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards'
        );
        $resources = Card::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";

        $this->expectsRequest(
            'post',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID,
            ["metadata" => ["key" => "value"]]
        );
        $resource = Card::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        static::assertInstanceOf(\Stripe\Issuing\Card::class, $resource);
    }

    public function testCanRetrieveDetails()
    {
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID . '/details'
        );
        $details = $resource->details();
        static::assertInstanceOf(\Stripe\Issuing\CardDetails::class, $details);
    }
}
