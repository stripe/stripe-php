<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\TaxId
 */
final class TaxIdTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'txi_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_ids'
        );
        $resources = TaxId::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(TaxId::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_ids/' . self::TEST_RESOURCE_ID
        );
        $resource = TaxId::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(TaxId::class, $resource);
        self::assertSame(
            '/v1/tax_ids/' . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/tax_ids'
        );
        $resource = TaxId::create(['type' => 'eu_vat', 'value' => 'DE123456789']);
        self::assertInstanceOf(TaxId::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = TaxId::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/tax_ids/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        self::assertInstanceOf(TaxId::class, $resource);
    }
}
