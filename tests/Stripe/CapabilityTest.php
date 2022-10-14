<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Capability
 */
final class CapabilityTest extends \Stripe\TestCase
{
    use TestHelper;

    const TEST_ACCOUNT_ID = 'acct_123';
    const TEST_RESOURCE_ID = 'acap_123';

    public function testHasCorrectUrl()
    {
        $resource = \Stripe\Account::retrieveCapability(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        static::assertSame(
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/capabilities/' . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    public function testIsNotDirectlyRetrievable()
    {
        $this->expectException(\Stripe\Exception\BadMethodCallException::class);

        Capability::retrieve(self::TEST_RESOURCE_ID);
    }

    public function testIsSaveable()
    {
        $resource = \Stripe\Account::retrieveCapability(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $resource->requested = true;
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/capabilities/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Capability::class, $resource);
    }

    public function testIsNotDirectlyUpdatable()
    {
        $this->expectException(\Stripe\Exception\BadMethodCallException::class);

        Capability::update(self::TEST_RESOURCE_ID, ['requested' => true]);
    }
}
