<?php

namespace Stripe\Service;

/**
 * @internal
 * @covers \Stripe\Service\AccountService
 */
final class AccountServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'acct_123';
    const TEST_CAPABILITY_ID = 'acap_123';
    const TEST_EXTERNALACCOUNT_ID = 'ba_123';
    const TEST_PERSON_ID = 'person_123';

    /** @var \Stripe\StripeClient */
    private $client;

    /** @var AccountService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new AccountService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Account::class, $resources->data[0]);
    }

    public function testAllCapabilities()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/capabilities'
        );
        $resources = $this->service->allCapabilities(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Capability::class, $resources->data[0]);
    }

    public function testAllExternalAccounts()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts'
        );
        $resources = $this->service->allExternalAccounts(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resources->data[0]);
    }

    public function testAllPersons()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons'
        );
        $resources = $this->service->allPersons(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Person::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts'
        );
        $resource = $this->service->create(['type' => 'custom']);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testCreateExternalAccount()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts'
        );
        $resource = $this->service->createExternalAccount(self::TEST_RESOURCE_ID, [
            'external_account' => 'btok_123',
        ]);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resource);
    }

    public function testCreateLoginLink()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/login_links'
        );
        $resource = $this->service->createLoginLink(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\LoginLink::class, $resource);
    }

    public function testCreatePerson()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons'
        );
        $resource = $this->service->createPerson(self::TEST_RESOURCE_ID, [
            'dob' => [
                'day' => 1,
                'month' => 1,
                'year' => 1980,
            ],
        ]);
        static::assertInstanceOf(\Stripe\Person::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
        static::assertTrue($resource->isDeleted());
    }

    public function testDeleteExternalAccount()
    {
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = $this->service->deleteExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resource);
        static::assertTrue($resource->isDeleted());
    }

    public function testDeletePerson()
    {
        $this->expectsRequest(
            'delete',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons/' . self::TEST_PERSON_ID
        );
        $resource = $this->service->deletePerson(self::TEST_RESOURCE_ID, self::TEST_PERSON_ID);
        static::assertInstanceOf(\Stripe\Person::class, $resource);
        static::assertTrue($resource->isDeleted());
    }

    public function testReject()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/reject'
        );
        $resource = $this->service->reject(self::TEST_RESOURCE_ID, ['reason' => 'fraud']);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testRetrieveCapability()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/capabilities/' . self::TEST_CAPABILITY_ID
        );
        $resource = $this->service->retrieveCapability(self::TEST_RESOURCE_ID, self::TEST_CAPABILITY_ID);
        static::assertInstanceOf(\Stripe\Capability::class, $resource);
    }

    public function testRetrieveExternalAccount()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = $this->service->retrieveExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resource);
    }

    public function testRetrievePerson()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons/' . self::TEST_PERSON_ID
        );
        $resource = $this->service->retrievePerson(self::TEST_RESOURCE_ID, self::TEST_PERSON_ID);
        static::assertInstanceOf(\Stripe\Person::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testUpdateCapability()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/capabilities/' . self::TEST_CAPABILITY_ID
        );
        $resource = $this->service->updateCapability(self::TEST_RESOURCE_ID, self::TEST_CAPABILITY_ID, [
            'requested' => true,
        ]);
        static::assertInstanceOf(\Stripe\Capability::class, $resource);
    }

    public function testUpdateExternalAccount()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/external_accounts/' . self::TEST_EXTERNALACCOUNT_ID
        );
        $resource = $this->service->updateExternalAccount(self::TEST_RESOURCE_ID, self::TEST_EXTERNALACCOUNT_ID, [
            'name' => 'name',
        ]);
        static::assertInstanceOf(\Stripe\BankAccount::class, $resource);
    }

    public function testUpdatePerson()
    {
        $this->expectsRequest(
            'post',
            '/v1/accounts/' . self::TEST_RESOURCE_ID . '/persons/' . self::TEST_PERSON_ID
        );
        $resource = $this->service->updatePerson(self::TEST_RESOURCE_ID, self::TEST_PERSON_ID, [
            'first_name' => 'First name',
        ]);
        static::assertInstanceOf(\Stripe\Person::class, $resource);
    }

    public function testRetrieveWithId()
    {
        $this->expectsRequest(
            'get',
            '/v1/accounts/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }

    public function testRetrieveWithoutId()
    {
        $this->expectsRequest(
            'get',
            '/v1/account'
        );
        $resource = $this->service->retrieve();
        static::assertInstanceOf(\Stripe\Account::class, $resource);
    }
}
