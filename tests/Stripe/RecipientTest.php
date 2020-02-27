<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Recipient
 */
final class RecipientTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'rp_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/recipients'
        );
        $resources = Recipient::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Recipient::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/recipients'
        );
        $resource = Recipient::create([
            'name' => 'name',
            'type' => 'individual',
        ]);
        static::assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/recipients/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/recipients/' . self::TEST_RESOURCE_ID
        );
        $resource = Recipient::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Recipient::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Recipient::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/recipients/' . $resource->id
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\Recipient::class, $resource);
    }
}
