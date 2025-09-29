<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\InvoiceLineItem
 */
final class InvoiceLineItemTest extends TestCase
{
    use TestHelper;

    const TEST_INVOICE_ID = 'ii_123';
    const TEST_RESOURCE_ID = 'ili_123';

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/invoices/' . self::TEST_INVOICE_ID . '/lines/' . self::TEST_RESOURCE_ID
        );
        $resource = InvoiceLineItem::update(self::TEST_INVOICE_ID, self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(InvoiceLineItem::class, $resource);
    }
}
