<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\TaxCode
 */
final class TaxCodeTest extends \Stripe\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'txcd_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_codes'
        );
        $resources = TaxCode::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\TaxCode::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_codes/' . self::TEST_RESOURCE_ID
        );
        $resource = TaxCode::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\TaxCode::class, $resource);
    }
}
