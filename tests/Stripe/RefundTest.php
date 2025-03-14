<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Refund
 */
final class RefundTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 're_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/refunds'
        );
        $resources = Refund::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Refund::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/refunds/' . self::TEST_RESOURCE_ID
        );
        $resource = Refund::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Refund::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/refunds'
        );
        $resource = Refund::create([
            'charge' => 'ch_123',
        ]);
        self::assertInstanceOf(Refund::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Refund::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/refunds/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(Refund::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/refunds/' . self::TEST_RESOURCE_ID
        );
        $resource = Refund::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Refund::class, $resource);
    }
}
