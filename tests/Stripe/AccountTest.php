<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Account
 */
final class AccountTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'acct_123';
    const TEST_CAPABILITY_ID = 'acap_123';
    const TEST_EXTERNALACCOUNT_ID = 'ba_123';
    const TEST_PERSON_ID = 'person_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts'
        );
        $resources = Account::all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Account::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testIsRetrievableWithoutId()
    {
        $this->expectsRequest(
            'get',
            '/v1/account'
        );
        $resource = Account::retrieve();
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts'
        );
        $resource = Account::create(['type' => 'custom']);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource = Account::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . $resource->id
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testIsRejectable()
    {
        $account = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . $account->id . '/reject'
        );
        $resource = $account->reject(['reason' => 'fraud']);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
        static::assertSame($resource, $account);
    }

    public function testIsDeauthorizable()
    {
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'post',
            '/oauth/deauthorize',
            [
                'client_id' => Stripe::getClientId(),
                'stripe_user_id' => $resource->id,
            ],
            null,
            false,
            [
                'stripe_user_id' => $resource->id,
            ],
            200,
            Stripe::$connectBase
        );
        $resource->deauthorize();
    }

    public function testPersons()
    {
        $account = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . $account->id . '/persons'
        );
        $persons = $account->persons();
        static::assertInternalType('array', $persons->data);
        static::assertInstanceOf(\Stripe\Person::class, $persons->data[0]);
    }

    public function testCanRetrieveCapability()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/capabilities/' . self::TEST_CAPABILITY_ID
        );
        $resource = Account::retrieveCapability(self::TEST_RESOURCE_ID, self::TEST_CAPABILITY_ID);
        static::assertInstanceOf(\Stripe\Capability::class, $resource);
    }

    public function testCanUpdateCapability()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/capabilities/' . self::TEST_CAPABILITY_ID
        );
        $resource = Account::updateCapability(self::TEST_RESOURCE_ID, self::TEST_CAPABILITY_ID, [
            'requested' => true,
        ]);
        static::assertInstanceOf(\Stripe\Capability::class, $resource);
    }

    public function testCanListCapabilities()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/capabilities'
        );
        $resources = Account::allCapabilities(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
    }

    public function testCanCreateExternalAccount()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts'
        );
        $resource = Account::createExternalAccount(self::TEST_RESOURCE_ID, [
            'external_account' => 'btok_123',
        ]);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resource);
    }

    public function testCanRetrieveExternalAccount()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = Account::retrieveExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resource);
    }

    public function testCanUpdateExternalAccount()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = Account::updateExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID, [
            'name' => 'name',
        ]);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resource);
    }

    public function testCanDeleteExternalAccount()
    {
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = Account::deleteExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID);
        static::assertTrue($resource->deleted);
    }

    public function testCanListExternalAccounts()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts'
        );
        $resources = Account::allExternalAccounts(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
    }

    public function testCanCreateLoginLink()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/login_links'
        );
        $resource = Account::createLoginLink(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\LoginLink::class, $resource);
    }

    public function testCanCreatePerson()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons'
        );
        $resource = Account::createPerson(self::TEST_RESOURCE_ID, [
            'dob' => [
                'day' => 1,
                'month' => 1,
                'year' => 1980,
            ],
        ]);
        static::assertInstanceOf(\Stripe\Person::class, $resource);
    }

    public function testCanRetrievePerson()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons/' . self::TEST_PERSON_ID
        );
        $resource = Account::retrievePerson(self::TEST_RESOURCE_ID, self::TEST_PERSON_ID);
        static::assertInstanceOf(\Stripe\Person::class, $resource);
    }

    public function testCanUpdatePerson()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons/' . self::TEST_PERSON_ID
        );
        $resource = Account::updatePerson(self::TEST_RESOURCE_ID, self::TEST_PERSON_ID, [
            'first_name' => 'First name',
        ]);
        static::assertInstanceOf(\Stripe\Person::class, $resource);
    }

    public function testCanDeletePerson()
    {
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons/' . self::TEST_PERSON_ID
        );
        $resource = Account::deletePerson(self::TEST_RESOURCE_ID, self::TEST_PERSON_ID);
        static::assertTrue($resource->deleted);
    }

    public function testCanListPersons()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons'
        );
        $resources = Account::allPersons(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
    }

    public function testSerializeNewAdditionalOwners()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'legal_entity' => StripeObject::constructFrom([]),
        ], null);
        $obj->legal_entity->additional_owners = [
            ['first_name' => 'Joe'],
            ['first_name' => 'Jane'],
        ];

        $expected = [
            'legal_entity' => [
                'additional_owners' => [
                    0 => ['first_name' => 'Joe'],
                    1 => ['first_name' => 'Jane'],
                ],
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeAddAdditionalOwners()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'legal_entity' => [
                'additional_owners' => [
                    StripeObject::constructFrom(['first_name' => 'Joe']),
                    StripeObject::constructFrom(['first_name' => 'Jane']),
                ],
            ],
        ], null);
        $obj->legal_entity->additional_owners[2] = ['first_name' => 'Andrew'];

        $expected = [
            'legal_entity' => [
                'additional_owners' => [
                    2 => ['first_name' => 'Andrew'],
                ],
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializePartiallyChangedAdditionalOwners()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'legal_entity' => [
                'additional_owners' => [
                    StripeObject::constructFrom(['first_name' => 'Joe']),
                    StripeObject::constructFrom(['first_name' => 'Jane']),
                ],
            ],
        ], null);
        $obj->legal_entity->additional_owners[1]->first_name = 'Stripe';

        $expected = [
            'legal_entity' => [
                'additional_owners' => [
                    1 => ['first_name' => 'Stripe'],
                ],
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeUnchangedAdditionalOwners()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'legal_entity' => [
                'additional_owners' => [
                    StripeObject::constructFrom(['first_name' => 'Joe']),
                    StripeObject::constructFrom(['first_name' => 'Jane']),
                ],
            ],
        ], null);

        $expected = [
            'legal_entity' => [
                'additional_owners' => [],
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeUnsetAdditionalOwners()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'legal_entity' => [
                'additional_owners' => [
                    StripeObject::constructFrom(['first_name' => 'Joe']),
                    StripeObject::constructFrom(['first_name' => 'Jane']),
                ],
            ],
        ], null);
        $obj->legal_entity->additional_owners = null;

        // Note that the empty string that we send for this one has a special
        // meaning for the server, which interprets it as an array unset.
        $expected = [
            'legal_entity' => [
                'additional_owners' => '',
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeAdditionalOwnersDeletedItem()
    {
        $this->expectException(\InvalidArgumentException::class);

        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'legal_entity' => [
                'additional_owners' => [
                    StripeObject::constructFrom(['first_name' => 'Joe']),
                    StripeObject::constructFrom(['first_name' => 'Jane']),
                ],
            ],
        ], null);
        unset($obj->legal_entity->additional_owners[0]);

        $obj->serializeParameters();
    }

    public function testSerializeExternalAccountString()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
        ], null);
        $obj->external_account = 'btok_123';

        $expected = [
            'external_account' => 'btok_123',
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeExternalAccountHash()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
        ], null);
        $obj->external_account = [
            'object' => 'bank_account',
            'routing_number' => '110000000',
            'account_number' => '000123456789',
            'country' => 'US',
            'currency' => 'usd',
        ];

        $expected = [
            'external_account' => [
                'object' => 'bank_account',
                'routing_number' => '110000000',
                'account_number' => '000123456789',
                'country' => 'US',
                'currency' => 'usd',
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeBankAccountString()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
        ], null);
        $obj->bank_account = 'btok_123';

        $expected = [
            'bank_account' => 'btok_123',
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeBankAccountHash()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
        ], null);
        $obj->bank_account = [
            'object' => 'bank_account',
            'routing_number' => '110000000',
            'account_number' => '000123456789',
            'country' => 'US',
            'currency' => 'usd',
        ];

        $expected = [
            'bank_account' => [
                'object' => 'bank_account',
                'routing_number' => '110000000',
                'account_number' => '000123456789',
                'country' => 'US',
                'currency' => 'usd',
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeNewIndividual()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
        ], null);
        $obj->individual = ['first_name' => 'Jane'];

        $expected = ['individual' => ['first_name' => 'Jane']];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializePartiallyChangedIndividual()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'individual' => Util\Util::convertToStripeObject([
                'object' => 'person',
                'first_name' => 'Jenny',
            ], null),
        ], null);
        $obj->individual = ['first_name' => 'Jane'];

        $expected = ['individual' => ['first_name' => 'Jane']];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeUnchangedIndividual()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'individual' => Util\Util::convertToStripeObject([
                'object' => 'person',
                'first_name' => 'Jenny',
            ], null),
        ], null);

        $expected = ['individual' => []];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeUnsetIndividual()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'account',
            'individual' => Util\Util::convertToStripeObject([
                'object' => 'person',
                'first_name' => 'Jenny',
            ], null),
        ], null);
        $obj->individual = null;

        $expected = ['individual' => ''];
        static::assertSame($expected, $obj->serializeParameters());
    }
}
