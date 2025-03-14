<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Quote
 */
final class QuoteTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'qt_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/quotes'
        );
        $resources = Quote::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Quote::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/quotes/' . self::TEST_RESOURCE_ID
        );
        $resource = Quote::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Quote::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/quotes'
        );
        $resource = Quote::create([
            'customer' => 'cus_xyz',
            'line_items' => [
                ['price' => 'price_abc', 'quantity' => 5],
                ['price' => 'price_xyz'],
            ],
        ]);
        self::assertInstanceOf(Quote::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Quote::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        self::assertInstanceOf(Quote::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID
        );
        $resource = Quote::update(
            self::TEST_RESOURCE_ID,
            [
                'metadata' => ['key' => 'value'],
            ]
        );
        self::assertInstanceOf(Quote::class, $resource);
    }

    public function testIsAcceptable()
    {
        $resource = Quote::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/accept'
        );
        $resource->accept();
        self::assertInstanceOf(Quote::class, $resource);
    }

    public function testIsCancelable()
    {
        $resource = Quote::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource->cancel();
        self::assertInstanceOf(Quote::class, $resource);
    }

    public function testIsFinalizable()
    {
        $resource = Quote::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/finalize'
        );
        $resource->finalizeQuote();
        self::assertInstanceOf(Quote::class, $resource);
    }

    public function testCanListLineItems()
    {
        $this->expectsRequest(
            'get',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/line_items'
        );
        $resources = Quote::allLineItems(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
    }

    public function testCanPdf()
    {
        $resource = Quote::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequestStream(
            'get',
            '/v1/quotes/' . self::TEST_RESOURCE_ID . '/pdf',
            null
        );
        $output = '';
        $resource->pdf(static function ($chunk) use (&$output) {
            $output .= $chunk;
        });
        self::assertSame('Stripe binary response', $output);
    }
}
