<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Dispute
 */
final class DisputeTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'dp_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/disputes'
        );
        $resources = Dispute::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Dispute::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Dispute::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/disputes/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(Dispute::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource = Dispute::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Dispute::class, $resource);
    }

    public function testIsClosable()
    {
        $dispute = Dispute::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/disputes/' . $dispute->id . '/close'
        );
        $resource = $dispute->close();
        self::assertInstanceOf(Dispute::class, $resource);
        self::assertSame($resource, $dispute);
    }
}
