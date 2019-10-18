<?php

namespace Stripe\Service;

class CouponServiceTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = "COUPON_ID";

    private $client = null;
    private $service = null;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient("sk_test_123", null, MOCK_URL);
        $this->service = new CouponService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            "get",
            "/v1/coupons"
        );
        $resources = $this->service->all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Coupon::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            "post",
            "/v1/coupons"
        );
        $resource = $this->service->create([
            "percent_off" => 25,
            "duration" => "repeating",
            "duration_in_months" => 3,
        ]);
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }

    public function testDelete()
    {
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            "delete",
            "/v1/coupons/" . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            "get",
            "/v1/coupons/" . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            "post",
            "/v1/coupons/" . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf(\Stripe\Coupon::class, $resource);
    }
}
