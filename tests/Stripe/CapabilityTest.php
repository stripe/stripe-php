<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Capability
 */
final class CapabilityTest extends TestCase
{
    use TestHelper;

    const TEST_ACCOUNT_ID = 'acct_123';
    const TEST_RESOURCE_ID = 'acap_123';

    public function testHasCorrectUrl()
    {
        $resource = Account::retrieveCapability(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        self::assertSame(
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/capabilities/' . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    public function testIsNotDirectlyRetrievable()
    {
        $this->expectException(Exception\BadMethodCallException::class);

        Capability::retrieve(self::TEST_RESOURCE_ID);
    }

    public function testIsSaveable()
    {
        $resource = Account::retrieveCapability(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $resource->requested = true;
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/capabilities/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        self::assertInstanceOf(Capability::class, $resource);
    }

    public function testIsNotDirectlyUpdatable()
    {
        $this->expectException(Exception\BadMethodCallException::class);

        Capability::update(self::TEST_RESOURCE_ID, ['requested' => true]);
    }
}
