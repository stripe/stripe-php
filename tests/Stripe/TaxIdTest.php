<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\TaxId
 */
final class TaxIdTest extends \Stripe\TestCase
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
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\TaxId::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_ids/' . self::TEST_RESOURCE_ID
        );
        $resource = \Stripe\TaxId::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\TaxId::class, $resource);
        static::assertSame(
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
        static::assertInstanceOf(\Stripe\TaxId::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = \Stripe\TaxId::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/tax_ids/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\TaxId::class, $resource);
    }
}
