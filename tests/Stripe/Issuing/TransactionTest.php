<?php

namespace Stripe\Issuing;

class TransactionTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'ipi_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions'
        );
        $resources = Transaction::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Issuing\Transaction::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID
        );
        $resource = Transaction::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Issuing\Transaction::class, $resource);
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
        $this->assertInstanceOf(\Stripe\Issuing\Transaction::class, $resource);
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
        $this->assertInstanceOf(\Stripe\Issuing\Transaction::class, $resource);
    }
}
