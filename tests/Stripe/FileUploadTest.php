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

    public function testDeserializesFromFile()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'file',
        ], null);
        $this->assertInstanceOf("Stripe\\FileUpload", $obj);
    }

    public function testDeserializesFromFileUpload()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'file_upload',
        ], null);
        $this->assertInstanceOf("Stripe\\FileUpload", $obj);
    }
}
