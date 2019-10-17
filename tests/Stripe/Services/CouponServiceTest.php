<?php

namespace Stripe\Services;

class CouponServiceTest extends ServiceTestCase
{
    const TEST_RESOURCE_ID = '25OFF';

    protected function getServiceClass()
    {
        return CouponService::class;
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/coupons'
        );
        $resources = $this->service->all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Coupon::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/coupons'
        );
        $resource = $this->service->create([
            "percent_off" => 25,
            "duration" => "repeating",
            "duration_in_months" => 3,
            "id" => self::TEST_RESOURCE_ID,
        ]);
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }

    public function testDelete()
    {
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }
}
