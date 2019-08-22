<?php

namespace Stripe;

class RecipientTest extends TestCase
{
    const TEST_RESOURCE_ID = 'rp_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/recipients'
        );
        $resources = Recipient::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Recipient::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/recipients'
        );
        $resource = Recipient::create([
            "name" => "name",
            "type" => "individual"
        ]);
        $this->assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/recipients/' . $resource->id
        );
        $resource->save();
        $this->assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource = Recipient::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/recipients/' . $resource->id
        );
        $resource->delete();
        $this->assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testCanListTransfers()
    {
        $recipient = Recipient::retrieve(self::TEST_RESOURCE_ID);

        // stripe-mock does not support this anymore so we stub it
        $this->stubRequest(
            'get',
            '/v1/transfers',
            ["recipient" => $recipient->id],
            null,
            false,
            [
                "object" => "list",
                "data" => [["id" => "tr_123", "object" => "transfer"]]
            ]
        );
        $resources = $recipient->transfers();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Transfer::class, $resources->data[0]);
    }
}
