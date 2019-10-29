<?php

namespace Stripe\Service\Issuing;

class CardServiceTest extends \Stripe\TestCase
{
    const TEST_RESOURCE_ID = "ic_123";

    private $client = null;
    private $service = null;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient("sk_test_123", null, MOCK_URL);
        $this->service = new CardService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            "get",
            "/v1/issuing/cards"
        );
        $resources = $this->service->all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\Issuing\Card::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            "post",
            "/v1/issuing/cards"
        );
        $resource = $this->service->create([
            "currency" => "usd",
            "type" => "physical",
        ]);
        $this->assertInstanceOf(\Stripe\Issuing\Card::class, $resource);
    }

    public function testDetails()
    {
        $this->expectsRequest(
            "get",
            "/v1/issuing/cards/" . self::TEST_RESOURCE_ID . "/details"
        );
        $resource = $this->service->details(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Issuing\CardDetails::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            "get",
            "/v1/issuing/cards/" . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\Issuing\Card::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            "post",
            "/v1/issuing/cards/" . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf(\Stripe\Issuing\Card::class, $resource);
    }
}
