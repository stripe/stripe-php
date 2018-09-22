<?php

namespace Stripe;

/*
 * These tests should really be part of `FileTest`, but because the file creation requests use a
 * different host, the tests for these methods need their own setup and teardown methods.
 */
class FileCreationTest extends TestCase
{
    /**
     * @before
     */
    public function setUpUploadBase()
    {
        Stripe::$apiUploadBase = Stripe::$apiBase;
        Stripe::$apiBase = null;
    }

    /**
     * @after
     */
    public function tearDownUploadBase()
    {
        Stripe::$apiBase = Stripe::$apiUploadBase;
        Stripe::$apiUploadBase = 'https://files.stripe.com';
    }

    public function testIsCreatableWithFileHandle()
    {
        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true,
            Stripe::$apiUploadBase
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
            true,
            Stripe::$apiUploadBase
        );
        $curlFile = new \CurlFile(dirname(__FILE__) . '/../data/test.png');
        $resource = File::create([
            "purpose" => "dispute_evidence",
            "file" => $curlFile,
        ]);
        $this->assertInstanceOf("Stripe\\File", $resource);
    }
}
