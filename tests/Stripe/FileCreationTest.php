<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\File
 */
final class FileCreationTest extends \Stripe\TestCase
{
    // These tests should really be part of `FileTest`, but because the file creation requests use a
    // different host, the tests for these methods need their own setup and teardown methods.

    use TestHelper;

    /** @var null|string */
    private $origApiUploadBase;

    /** @before */
    public function setUpUploadBase()
    {
        $this->origApiBase = Stripe::$apiBase;
        $this->origApiUploadBase = Stripe::$apiUploadBase;

        Stripe::$apiUploadBase = \defined('MOCK_URL') ? MOCK_URL : 'http://localhost:12111';
        Stripe::$apiBase = null;
    }

    /** @after */
    public function tearDownUploadBase()
    {
        Stripe::$apiBase = $this->origApiBase;
        Stripe::$apiUploadBase = $this->origApiUploadBase;
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
        $fp = \fopen(__DIR__ . '/../data/test.png', 'rb');
        $resource = File::create([
            'purpose' => 'dispute_evidence',
            'file' => $fp,
            'file_link_data' => ['create' => true],
        ]);
        static::assertInstanceOf(\Stripe\File::class, $resource);
    }

    public function testIsCreatableWithCURLFile()
    {
        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true,
            Stripe::$apiUploadBase
        );
        $curlFile = new \CURLFile(__DIR__ . '/../data/test.png');
        $resource = File::create([
            'purpose' => 'dispute_evidence',
            'file' => $curlFile,
            'file_link_data' => ['create' => true],
        ]);
        static::assertInstanceOf(\Stripe\File::class, $resource);
    }
}
