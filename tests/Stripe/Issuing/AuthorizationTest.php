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
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID
        );
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $resource);
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
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $resource);
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
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $resource);
    }

    public function testIsApprovable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/approve'
        );
        $resource = $resource->approve();
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $resource);
    }

    public function testIsDeclinable()
    {
        $resource = Authorization::retrieve(self::TEST_RESOURCE_ID);

        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/decline'
        );
        $resource = $resource->decline();
        static::assertInstanceOf(\Stripe\Issuing\Authorization::class, $resource);
    }
}
