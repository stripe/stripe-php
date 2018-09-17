<?php

namespace Stripe;

class FileTest extends TestCase
{
    const TEST_RESOURCE_ID = 'file_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/files'
        );
        $resources = File::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\File", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/files/' . self::TEST_RESOURCE_ID
        );
        $resource = File::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\File", $resource);
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
        $resource = File::create([
            "purpose" => "dispute_evidence",
            "file" => $fp,
        ]);
        $this->assertInstanceOf("Stripe\\File", $resource);
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
        $resource = File::create([
            "purpose" => "dispute_evidence",
            "file" => $curlFile,
        ]);
        $this->assertInstanceOf("Stripe\\File", $resource);
    }

    public function testDeserializesFromFile()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'file',
        ], null);
        $this->assertInstanceOf("Stripe\\File", $obj);
    }

    public function testDeserializesFromFileUpload()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'file_upload',
        ], null);
        $this->assertInstanceOf("Stripe\\File", $obj);
    }
}
