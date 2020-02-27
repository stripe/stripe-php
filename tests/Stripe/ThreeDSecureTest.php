<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\ThreeDSecure
 */
final class ThreeDSecureTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'tdsrc_123';

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/3d_secure/' . self::TEST_RESOURCE_ID
        );
        $resource = ThreeDSecure::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\ThreeDSecure::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/3d_secure'
        );
        $resource = ThreeDSecure::create([
            'amount' => 100,
            'currency' => 'usd',
            'return_url' => 'url',
        ]);
        static::assertInstanceOf(\Stripe\ThreeDSecure::class, $resource);
    }
}
