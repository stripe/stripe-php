<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Person
 */
final class PersonTest extends TestCase
{
    use TestHelper;

    const TEST_ACCOUNT_ID = 'acct_123';
    const TEST_RESOURCE_ID = 'person_123';

    public function testHasCorrectUrl()
    {
        $resource = Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        self::assertSame(
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/persons/' . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    public function testIsNotDirectlyRetrievable()
    {
        $this->expectException(Exception\BadMethodCallException::class);

        Person::retrieve(self::TEST_RESOURCE_ID);
    }

    public function testIsSaveable()
    {
        $resource = Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $resource->first_name = 'value';
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/persons/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        self::assertSame(Person::class, \get_class($resource));
    }

    public function testIsNotDirectlyUpdatable()
    {
        $this->expectException(Exception\BadMethodCallException::class);

        Person::update(self::TEST_RESOURCE_ID, [
            'first_name' => ['John'],
        ]);
    }

    public function testIsDeletable()
    {
        $resource = Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/persons/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        self::assertSame(Person::class, \get_class($resource));
    }
}
