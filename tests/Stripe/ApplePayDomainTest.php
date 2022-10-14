<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\ApplePayDomain
 */
final class ApplePayDomainTest extends \Stripe\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'apwc_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/apple_pay/domains'
        );
        $resources = ApplePayDomain::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\ApplePayDomain::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/apple_pay/domains/' . self::TEST_RESOURCE_ID
        );
        $resource = ApplePayDomain::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\ApplePayDomain::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/apple_pay/domains'
        );
        $resource = ApplePayDomain::create([
            'domain_name' => 'domain',
        ]);
        static::assertInstanceOf(\Stripe\ApplePayDomain::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = ApplePayDomain::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/apple_pay/domains/' . $resource->id
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\ApplePayDomain::class, $resource);
    }
}
