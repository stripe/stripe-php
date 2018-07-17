<?php

namespace Stripe\Issuing;

class TransactionTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'ipi_123';

    // stripe-mock does not support /v1/issuing/transactions yet so we stub it
    // and create a fixture for it
    public function createFixture()
    {
        $base = [
            'id' => self::TEST_RESOURCE_ID,
            'object' => 'issuing.transaction',
            'metadata' => [],
        ];
        return Transaction::constructFrom(
            $base,
            new \Stripe\Util\RequestOptions()
        );
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions'
        );
        $resources = Transaction::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Issuing\\Transaction", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID
        );
        $resource = Transaction::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Issuing\\Transaction", $resource);
    }

    public function testIsSaveable()
    {
        $resource = Transaction::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";

        $this->expectsRequest(
            'post',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Issuing\\Transaction", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID,
            ["metadata" => ["key" => "value"]]
        );
        $resource = Transaction::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\Issuing\\Transaction", $resource);
    }
}
