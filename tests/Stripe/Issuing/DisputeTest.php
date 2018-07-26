<?php

namespace Stripe\Issuing;

class DisputeTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'idp_123';

    public function testIsCreatable()
    {
        $params = [
            "reason" => "fraudulent",
            "transaction" => "ipi_123",
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes',
            $params
        );
        $resource = Dispute::create($params);
        $this->assertInstanceOf("Stripe\\Issuing\\Dispute", $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes'
        );
        $resources = Dispute::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Issuing\\Dispute", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Issuing\\Dispute", $resource);
    }

    public function testIsSaveable()
    {
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";

        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Issuing\\Dispute", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID,
            ["metadata" => ["key" => "value"]]
        );
        $resource = Dispute::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\Issuing\\Dispute", $resource);
    }
}
