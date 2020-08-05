<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\PromotionCode
 */
final class PromotionCodeTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'promo_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/promotion_codes'
        );
        $resources = PromotionCode::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\PromotionCode::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/promotion_codes/' . self::TEST_RESOURCE_ID
        );
        $resource = PromotionCode::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\PromotionCode::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/promotion_codes'
        );
        $resource = PromotionCode::create([
            'coupon' => 'co_123',
            'code' => 'MYCODE',
        ]);
        static::assertInstanceOf(\Stripe\PromotionCode::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = PromotionCode::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/promotion_codes/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\PromotionCode::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/promotion_codes/' . self::TEST_RESOURCE_ID
        );
        $resource = PromotionCode::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\PromotionCode::class, $resource);
    }
}
