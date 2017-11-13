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
        $this->assertSame("Stripe\\Recipient", get_class($resources->data[0]));
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\Recipient", get_class($resource));
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/recipients'
        );
        $resource = Recipient::create(array(
            "name" => "name",
            "type" => "individual"
        ));
        $this->assertSame("Stripe\\Recipient", get_class($resource));
    }

    public function testIsSaveable()
    {
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertSame("Stripe\\Recipient", get_class($resource));
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource = Recipient::update(self::TEST_RESOURCE_ID, array(
            "metadata" => array("key" => "value"),
        ));
        $this->assertSame("Stripe\\Recipient", get_class($resource));
    }

    public function testIsDeletable()
    {
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertSame("Stripe\\Recipient", get_class($resource));
    }

    public function testCanListTransfers()
    {
        $recipient = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/transfers',
            array("recipient" => $recipient->id)
        );
        $resources = $recipient->transfers();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\Transfer", get_class($resources->data[0]));
    }
}
