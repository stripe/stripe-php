<?php

namespace Stripe\Services;

class FileServiceTest extends ServiceTestCase
{
    const TEST_RESOURCE_ID = 'file_123';

    protected function getServiceClass()
    {
        return FileService::class;
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/files'
        );
        $resources = $this->service->all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf(\Stripe\File::class, $resources->data[0]);
    }

    public function testCreateWithFileHandle()
    {
        $stripeClient = new \Stripe\StripeClient("sk_test_123", null, null, null, MOCK_URL);
        $service = new FileService($stripeClient);

        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true,
            MOCK_URL
        );
        $fp = fopen(dirname(__FILE__) . '/../../data/test.png', 'r');
        $resource = $service->create([
            "purpose" => "dispute_evidence",
            "file" => $fp,
            "file_link_data" => ["create" => true]
        ]);
        $this->assertInstanceOf(\Stripe\File::class, $resource);
    }

    public function testIsCreatableWithCURLFile()
    {
        $stripeClient = new \Stripe\StripeClient("sk_test_123", null, null, null, MOCK_URL);
        $service = new FileService($stripeClient);

        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true,
            MOCK_URL
        );
        $curlFile = new \CURLFile(dirname(__FILE__) . '/../../data/test.png');
        $resource = $service->create([
            "purpose" => "dispute_evidence",
            "file" => $curlFile,
            "file_link_data" => ["create" => true]
        ]);
        $this->assertInstanceOf(\Stripe\File::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/files/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf(\Stripe\File::class, $resource);
    }
}
