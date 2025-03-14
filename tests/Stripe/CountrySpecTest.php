<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\CountrySpec
 */
final class CountrySpecTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'US';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/country_specs'
        );
        $resources = CountrySpec::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(CountrySpec::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/country_specs/' . self::TEST_RESOURCE_ID
        );
        $resource = CountrySpec::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(CountrySpec::class, $resource);
    }
}
