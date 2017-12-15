<?php

namespace Stripe;

class AccountTest extends TestCase
{
    const TEST_RESOURCE_ID = 'acct_123';
    const TEST_EXTERNALACCOUNT_ID = 'ba_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts'
        );
        $resources = Account::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\Account", get_class($resources->data[0]));
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\Account", get_class($resource));
    }

    public function testIsRetrievableWithoutId()
    {
        $this->expectsRequest(
            'get',
            '/v1/account'
        );
        $resource = Account::retrieve();
        $this->assertSame("Stripe\\Account", get_class($resource));
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts'
        );
        $resource = Account::create(array("type" => "custom"));
        $this->assertSame("Stripe\\Account", get_class($resource));
    }

    public function testIsSaveable()
    {
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertSame("Stripe\\Account", get_class($resource));
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource = Account::update(self::TEST_RESOURCE_ID, array(
            "metadata" => array("key" => "value"),
        ));
        $this->assertSame("Stripe\\Account", get_class($resource));
    }

    public function testIsDeletable()
    {
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertSame("Stripe\\Account", get_class($resource));
    }

    public function testIsRejectable()
    {
        $account = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . $account->id . '/reject'
        );
        $resource = $account->reject(array("reason" => "fraud"));
        $this->assertSame("Stripe\\Account", get_class($resource));
        $this->assertSame($resource, $account);
    }

    public function testIsDeauthorizable()
    {
        $resource = Account::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'post',
            '/oauth/deauthorize',
            array(
                'client_id' => Stripe::getClientId(),
                'stripe_user_id' => $resource->id,
            ),
            null,
            false,
            array(
                'stripe_user_id' => $resource->id,
            ),
            200,
            Stripe::$connectBase
        );
        $resource->deauthorize();
    }

    public function testCanCreateExternalAccount()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts'
        );
        $resource = Account::createExternalAccount(self::TEST_RESOURCE_ID, array("external_account" => "btok_123"));
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
    }

    public function testCanRetrieveExternalAccount()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = Account::retrieveExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID);
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
    }

    public function testCanUpdateExternalAccount()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = Account::updateExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID, array("name" => "name"));
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
    }

    public function testCanDeleteExternalAccount()
    {
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = Account::deleteExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID);
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
    }

    public function testCanListExternalAccounts()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts'
        );
        $resources = Account::allExternalAccounts(self::TEST_RESOURCE_ID);
        $this->assertTrue(is_array($resources->data));
    }

    public function testCanCreateLoginLink()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/login_links'
        );
        $resource = Account::createLoginLink(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\LoginLink", get_class($resource));
    }
}
