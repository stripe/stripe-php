<?php

namespace Stripe;

class PersonTest extends TestCase
{
    const TEST_ACCOUNT_ID = 'acct_123';
    const TEST_RESOURCE_ID = 'person_123';

    public function testHasCorrectUrl()
    {
        $resource = \Stripe\Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $this->assertSame(
            "/v1/accounts/" . self::TEST_ACCOUNT_ID . "/persons/" . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testIsNotDirectlyRetrievable()
    {
        Person::retrieve(self::TEST_RESOURCE_ID);
    }

    public function testIsSaveable()
    {
        $resource = \Stripe\Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $resource->first_name = "value";
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/persons/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertSame("Stripe\\Person", get_class($resource));
    }

    /**
     * @expectedException \Stripe\Error\InvalidRequest
     */
    public function testIsNotDirectlyUpdatable()
    {
        Person::update(self::TEST_RESOURCE_ID, [
            "first_name" => ["John"],
        ]);
    }

    public function testIsDeletable()
    {
        $resource = \Stripe\Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/persons/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertSame("Stripe\\Person", get_class($resource));
    }
}
