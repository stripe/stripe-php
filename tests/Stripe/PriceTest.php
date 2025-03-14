<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Price
 */
final class PriceTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'price_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/prices'
        );
        $resources = Price::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Price::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/prices/' . self::TEST_RESOURCE_ID
        );
        $resource = Price::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Price::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/prices'
        );
        $resource = Price::create([
            'unit_amount' => 2000,
            'currency' => 'usd',
            'recurring' => [
                'interval' => 'month',
            ],
            'product_data' => [
                'name' => 'Product Name',
            ],
        ]);
        self::assertInstanceOf(Price::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Price::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/prices/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(Price::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/prices/' . self::TEST_RESOURCE_ID
        );
        $resource = Price::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Price::class, $resource);
    }
}
