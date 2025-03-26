<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Invoice
 */
final class InvoiceTest extends TestCase
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
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Invoice::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource = Invoice::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Invoice::class, $resource);
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
        self::assertInstanceOf(Invoice::class, $resource);
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
        self::assertInstanceOf(Invoice::class, $resource);
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
        self::assertInstanceOf(Invoice::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/invoices/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        self::assertInstanceOf(Invoice::class, $resource);
    }

    public function testCanFinalizeInvoice()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/finalize'
        );
        $resource = $invoice->finalizeInvoice();
        self::assertInstanceOf(Invoice::class, $resource);
        self::assertSame($resource, $invoice);
    }

    public function testCanMarkUncollectible()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/mark_uncollectible'
        );
        $resource = $invoice->markUncollectible();
        self::assertInstanceOf(Invoice::class, $resource);
        self::assertSame($resource, $invoice);
    }

    public function testCanPay()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/pay'
        );
        $resource = $invoice->pay();
        self::assertInstanceOf(Invoice::class, $resource);
        self::assertSame($resource, $invoice);
    }

    public function testCanSendInvoice()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/send'
        );
        $resource = $invoice->sendInvoice();
        self::assertInstanceOf(Invoice::class, $resource);
        self::assertSame($resource, $invoice);
    }

    public function testCanVoidInvoice()
    {
        $invoice = Invoice::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . $invoice->id . '/void'
        );
        $resource = $invoice->voidInvoice();
        self::assertInstanceOf(Invoice::class, $resource);
        self::assertSame($resource, $invoice);
    }

    public function testCanListLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/invoices/' . self::TEST_RESOURCE_ID . '/lines'
        );
        $resources = Invoice::allLines(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
    }
}
