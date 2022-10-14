<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\QuoteService
 */
final class QuoteServiceTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'qt_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var QuoteService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL, 'files_base' => MOCK_URL]);
        $this->service = new QuoteService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/quotes'
        );
        $resources = $this->service->all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Quote::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/quotes'
        );
        $resource = $this->service->create([
            'customer' => 'cus_123',
        ]);
        static::assertInstanceOf(\Stripe\Quote::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/quotes/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Quote::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Quote::class, $resource);
    }

    public function testFinalizeQuote()
    {
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/finalize'
        );
        $resource = $this->service->finalizeQuote(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Quote::class, $resource);
    }

    public function testCancel()
    {
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource = $this->service->cancel(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Quote::class, $resource);
    }

    public function testAccept()
    {
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource = $this->service->cancel(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Quote::class, $resource);
    }

    public function testAllLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/line_items'
        );
        $resources = $this->service->allLineItems(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
    }

    public function testPdf()
    {
        $this->expectsRequestStream(
            'get',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/pdf'
        );
        $output = '';
        $resources = $this->service->pdf(self::TEST_RESOURCE_ID, function ($chunk) use (&$output) {
            $output .= $chunk;
        });
        static::assertSame('Stripe binary response', $output);
    }
}
