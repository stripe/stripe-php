<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Person
 */
final class PersonTest extends \Stripe\TestCase
{
    use TestHelper;

    const TEST_ACCOUNT_ID = 'acct_123';
    const TEST_RESOURCE_ID = 'person_123';

    public function testHasCorrectUrl()
    {
        $resource = \Stripe\Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        static::assertSame(
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/persons/' . self::TEST_RESOURCE_ID,
            $resource->instanceUrl()
        );
    }

    public function testIsNotDirectlyRetrievable()
    {
        $this->expectException(\Stripe\Exception\BadMethodCallException::class);

        Person::retrieve(self::TEST_RESOURCE_ID);
    }

    public function testIsSaveable()
    {
        $resource = \Stripe\Account::retrievePerson(self::TEST_ACCOUNT_ID, self::TEST_RESOURCE_ID);
        $resource->first_name = 'value';
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_ACCOUNT_ID . '/persons/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        static::assertSame(\Stripe\Person::class, \get_class($resource));
    }

    public function testIsNotDirectlyUpdatable()
    {
        $this->expectException(\Stripe\Exception\BadMethodCallException::class);

        Person::update(self::TEST_RESOURCE_ID, [
            'first_name' => ['John'],
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
        static::assertSame(\Stripe\Person::class, \get_class($resource));
    }
}
