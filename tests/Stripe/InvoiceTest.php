<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Invoice
 */
final class InvoiceTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'in_123';
    const TEST_LINE_ID = 'ii_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices'
        );
        $resources = Invoice::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Invoice::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource = Invoice::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices'
        );
        $resource = Invoice::create([
            'customer' => 'cus_123',
        ]);
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource = Invoice::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
    }

    public function testCanFinalizeInvoice()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/finalize'
        );
        $resource = $invoice->finalizeInvoice();
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
        static::assertSame($resource, $invoice);
    }

    public function testCanMarkUncollectible()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/mark_uncollectible'
        );
        $resource = $invoice->markUncollectible();
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
        static::assertSame($resource, $invoice);
    }

    public function testCanPay()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/pay'
        );
        $resource = $invoice->pay();
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
        static::assertSame($resource, $invoice);
    }

    public function testCanRetrieveUpcoming()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/upcoming'
        );
        $resource = Invoice::upcoming(['customer' => 'cus_123']);
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
    }

    public function testCanSendInvoice()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/send'
        );
        $resource = $invoice->sendInvoice();
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
        static::assertSame($resource, $invoice);
    }

    public function testCanVoidInvoice()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/void'
        );
        $resource = $invoice->voidInvoice();
        static::assertInstanceOf(\Stripe\Invoice::class, $resource);
        static::assertSame($resource, $invoice);
    }

    public function testCanListLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/lines'
        );
        $resources = Invoice::allLines(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
    }
}
