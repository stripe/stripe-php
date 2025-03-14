<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Charge
 */
final class ChargeTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'ch_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/charges'
        );
        $resources = Charge::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Charge::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/charges/' . self::TEST_RESOURCE_ID
        );
        $resource = Charge::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Charge::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/charges'
        );
        $resource = Charge::create([
            'amount' => 100,
            'currency' => 'usd',
            'source' => 'tok_123',
        ]);
        self::assertInstanceOf(Charge::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Charge::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/charges/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(Charge::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/charges/' . self::TEST_RESOURCE_ID
        );
        $resource = Charge::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Charge::class, $resource);
    }

    public function testCanCapture()
    {
        $charge = Charge::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/charges/' . $charge->id . '/capture'
        );
        $resource = $charge->capture();
        self::assertInstanceOf(Charge::class, $resource);
        self::assertSame($resource, $charge);
    }
}
