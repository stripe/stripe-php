<?php

namespace Stripe;

class ReviewTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = 'prv_123';

    public function testIsApprovable()
    {
        $resource = Review::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/reviews/' . self::TEST_RESOURCE_ID . '/approve'
        );
        $resource->approve();
        $this->assertInstanceOf("Stripe\\Review", $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reviews'
        );
        $resources = Review::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Review", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reviews/' . self::TEST_RESOURCE_ID
        );
        $resource = Review::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Review", $resource);
    }
}
