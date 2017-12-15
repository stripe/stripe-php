<?php

namespace Stripe;

class EphemeralKeyTest extends TestCase
{
    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/ephemeral_keys',
            null,
            array("Stripe-Version: 2017-05-25")
        );
        $resource = EphemeralKey::create(array(
            "customer" => "cus_123",
        ), array("stripe_version" => "2017-05-25"));
        $this->assertSame("Stripe\\EphemeralKey", get_class($resource));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsNotCreatableWithoutAnExplicitApiVersion()
    {
        $resource = EphemeralKey::create(array(
            "customer" => "cus_123",
        ));
    }

    public function testIsDeletable()
    {
        $key = EphemeralKey::create(array(
            "customer" => "cus_123",
        ), array("stripe_version" => "2017-05-25"));
        $this->expectsRequest(
            'delete',
            '/v1/ephemeral_keys/' . $key->id
        );
        $resource = $key->delete();
        $this->assertSame("Stripe\\EphemeralKey", get_class($resource));
    }
}
