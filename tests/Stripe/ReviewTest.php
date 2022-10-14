<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Review
 */
final class ReviewTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'prv_123';

    public function testIsApprovable()
    {
        $resource = Review::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/reviews/' . self::TEST_RESOURCE_ID . '/approve'
        );
        $resource->approve();
        static::assertInstanceOf(\Stripe\Review::class, $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reviews'
        );
        $resources = Review::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Review::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reviews/' . self::TEST_RESOURCE_ID
        );
        $resource = Review::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Review::class, $resource);
    }
}
