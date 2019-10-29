<?php

namespace Stripe\Service;

/**
 * @internal
 */
final class FileServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'file_123';

    private $client;
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new FileService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/files'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\File::class, $resources->data[0]);
    }

    public function testCreateWithCURLFile()
    {
        $client = new \Stripe\StripeClient('sk_test_123', null, null, null, MOCK_URL);
        $service = new FileService($client);

        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true,
            MOCK_URL
        );
        $curlFile = new \CURLFile(__DIR__ . '/../../data/test.png');
        $resource = $service->create([
            'purpose' => 'dispute_evidence',
            'file' => $curlFile,
            'file_link_data' => ['create' => true],
        ]);
        static::assertInstanceOf(\Stripe\File::class, $resource);
    }

    public function testCreateWithFileHandle()
    {
        $client = new \Stripe\StripeClient('sk_test_123', null, null, null, MOCK_URL);
        $service = new FileService($client);

        $this->expectsRequest(
            'post',
            '/v1/files',
            null,
            ['Content-Type: multipart/form-data'],
            true,
            MOCK_URL
        );
        $fp = \fopen(__DIR__ . '/../../data/test.png', 'rb');
        $resource = $service->create([
            'purpose' => 'dispute_evidence',
            'file' => $fp,
            'file_link_data' => ['create' => true],
        ]);
        static::assertInstanceOf(\Stripe\File::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/files/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\File::class, $resource);
    }
}
