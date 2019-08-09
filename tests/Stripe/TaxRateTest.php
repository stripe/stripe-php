<?php

namespace Stripe;

class TaxRateTest extends TestCase
{
    const TEST_RESOURCE_ID = 'txr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_rates'
        );
        $resources = TaxRate::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\TaxRate::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_rates/' . self::TEST_RESOURCE_ID
        );
        $resource = TaxRate::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\TaxRate::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/tax_rates'
        );
        $resource = TaxRate::create([
            "display_name" => "name",
            "inclusive" => false,
            "percentage" => 10.15,
        ]);
        $this->assertInstanceOf(\Stripe\TaxRate::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = TaxRate::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/tax_rates/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertInstanceOf(\Stripe\TaxRate::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/tax_rates/' . self::TEST_RESOURCE_ID
        );
        $resource = TaxRate::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf(\Stripe\TaxRate::class, $resource);
    }
}
