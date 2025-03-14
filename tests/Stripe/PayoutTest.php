<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Payout
 */
final class PayoutTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'po_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/payouts'
        );
        $resources = Payout::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Payout::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/payouts/' . self::TEST_RESOURCE_ID
        );
        $resource = Payout::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Payout::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/payouts'
        );
        $resource = Payout::create([
            'amount' => 100,
            'currency' => 'usd',
        ]);
        self::assertInstanceOf(Payout::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Payout::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/payouts/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(Payout::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/payouts/' . self::TEST_RESOURCE_ID
        );
        $resource = Payout::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Payout::class, $resource);
    }

    public function testIsCancelable()
    {
        $resource = Payout::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payouts/' . $resource->id . '/cancel'
        );
        $resource->cancel();
        self::assertInstanceOf(Payout::class, $resource);
    }

    public function testIsReverseable()
    {
        $resource = Payout::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/payouts/' . $resource->id . '/reverse'
        );
        $resource->reverse();
        self::assertInstanceOf(Payout::class, $resource);
    }
}
