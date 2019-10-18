<?php

namespace Stripe\Service;

class AbstractServiceTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = "25OFF";

    private $client = null;
    private $service = null;

    /**
     * @before
     */
    public function setUpMockService()
    {
        $this->client = new \Stripe\StripeClient("sk_test_123", null, MOCK_URL);
        // Testing with CouponService, because testing abstract classes is hard in PHP :/
        $this->service = new \Stripe\Service\CouponService($this->client);
    }

    /**
     * @expectedException \Stripe\Exception\InvalidArgumentException
     * @expectedExceptionMessage The resource ID cannot be null or whitespace.
     */
    public function testRetrieveThrowsIfIdNullIsNull()
    {
        $this->service->retrieve(null);
    }

    /**
     * @expectedException \Stripe\Exception\InvalidArgumentException
     * @expectedExceptionMessage The resource ID cannot be null or whitespace.
     */
    public function testRetrieveThrowsIfIdNullIsEmpty()
    {
        $this->service->retrieve("");
    }

    /**
     * @expectedException \Stripe\Exception\InvalidArgumentException
     * @expectedExceptionMessage The resource ID cannot be null or whitespace.
     */
    public function testRetrieveThrowsIfIdNullIsWhitespace()
    {
        $this->service->retrieve(" ");
    }
}
