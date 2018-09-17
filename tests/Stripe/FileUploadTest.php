<?php

namespace Stripe;

class FileUploadTest extends TestCase
{
    const TEST_RESOURCE_ID = 'file_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/files'
        );
        $resources = FileUpload::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\FileUpload", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/files/' . self::TEST_RESOURCE_ID
        );
        $resource = FileUpload::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\FileUpload", $resource);
    }

    public function testIsCreatableWithFileHandle()
    {
        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );
        $fp = fopen(dirname(__FILE__) . '/../data/test.png', 'r');
        $resource = FileUpload::create([
            "purpose" => "dispute_evidence",
            "file" => $fp,
        ]);
        $this->assertInstanceOf("Stripe\\FileUpload", $resource);
    }

    public function testIsCreatableWithCurlFile()
    {
        if (!class_exists('\CurlFile', false)) {
            // Older PHP versions don't support this
            return;
        }

        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true
        );
        $curlFile = new \CurlFile(dirname(__FILE__) . '/../data/test.png');
        $resource = FileUpload::create([
            "purpose" => "dispute_evidence",
            "file" => $curlFile,
        ]);
        $this->assertInstanceOf("Stripe\\FileUpload", $resource);
    }
}
