<?php

namespace Stripe\Issuing;

class AuthorizationTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'iauth_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations'
        );
        $resources = Authorization::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Issuing\\Authorization", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID
        );
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Issuing\\Authorization", $resource);
    }

    public function testIsSaveable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Issuing\\Authorization", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID,
            ["metadata" => ["key" => "value"]]
        );
        $resource = Authorization::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\Issuing\\Authorization", $resource);
    }

    public function testIsApprovable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/approve'
        );
        $resource = $resource->approve();
        $this->assertInstanceOf("Stripe\\Issuing\\Authorization", $resource);
    }

    public function testIsDeclinable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/decline'
        );
        $resource = $resource->decline();
        $this->assertInstanceOf("Stripe\\Issuing\\Authorization", $resource);
    }
}
