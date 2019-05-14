<?php

namespace Stripe;

class CapabilityTest extends TestCase
{
    const TEST_ACCOUNT_ID = 'acct_123';
    const TEST_RESOURCE_ID = 'acap_123';

    public function testHasCorrectUrl()
    {
        $resource = \Stripe\Account::retrieveCapability(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $this->assertSame(
            "/v1/accounts/" . self::TEST_ACCOUNT_ID . "/capabilities/" . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testIsNotDirectlyRetrievable()
    {
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
        $this->assertSame("Stripe\\Capability", get_class($resource));
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testIsNotDirectlyUpdatable()
    {
        Capability::update(self::TEST_RESOURCE_ID, ["requested" => true]);
    }
}
