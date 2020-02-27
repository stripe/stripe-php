<?php

namespace Stripe\Terminal;

/**
 * @internal
 * @covers \Stripe\Terminal\Location
 */
final class LocationTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'loc_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/terminal/locations'
        );
        $resources = Location::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/terminal/locations/' . self::TEST_RESOURCE_ID
        );
        $resource = Location::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Location::retrieve(self::TEST_RESOURCE_ID);
        $resource->display_name = 'new-name';

        $this->expectsRequest(
            'post',
            '/v1/terminal/locations/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/locations/' . self::TEST_RESOURCE_ID,
            ['display_name' => 'new-name']
        );
        $resource = Location::update(self::TEST_RESOURCE_ID, [
            'display_name' => 'new-name',
        ]);
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/locations',
            [
                'display_name' => 'name',
                'address' => [
                    'line1' => 'line1',
                    'country' => 'US',
                    'state' => 'CA',
                    'postal_code' => '12345',
                    'city' => 'San Francisco',
                ],
            ]
        );
        $resource = Location::create([
            'display_name' => 'name',
            'address' => [
                'line1' => 'line1',
                'country' => 'US',
                'state' => 'CA',
                'postal_code' => '12345',
                'city' => 'San Francisco',
            ],
        ]);
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Location::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/terminal/locations/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\Terminal\Location::class, $resource);
    }
}
