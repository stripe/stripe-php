<?php

namespace Stripe\Services;

class PaymentSourceServiceTest extends ServiceTestCase
{
    const TEST_PARENT_RESOURCE_ID = 'cus_123';
    const TEST_RESOURCE_ID = 'card_123';

    protected function getServiceClass()
    {
        return PaymentSourceService::class;
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_PARENT_RESOURCE_ID . '/sources'
        );
        $resources = $this->service->all(self::TEST_PARENT_RESOURCE_ID);
        $this->assertTrue(is_array($resources->data));
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_PARENT_RESOURCE_ID . '/sources'
        );
        $resource = $this->service->create(
            self::TEST_PARENT_RESOURCE_ID,
            [
                "source" => "tok_123",
            ]
        );
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_PARENT_RESOURCE_ID . '/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_PARENT_RESOURCE_ID, self::TEST_RESOURCE_ID);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_PARENT_RESOURCE_ID . '/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_PARENT_RESOURCE_ID, self::TEST_RESOURCE_ID);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_PARENT_RESOURCE_ID . '/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(
            self::TEST_PARENT_RESOURCE_ID,
            self::TEST_RESOURCE_ID,
            [
                "metadata" => ["key" => "value"],
            ]
        );
    }
}
