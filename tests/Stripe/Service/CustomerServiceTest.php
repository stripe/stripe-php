<?php

namespace Stripe\Service;

/**
 * @internal
 */
final class CustomerServiceTest extends \PHPUnit\Framework\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'cus_123';
    const TEST_CUSTOMER_BALANCE_TRANSACTION_ID = 'cbtxn_123';
    const TEST_SOURCE_ID = 'card_123';
    const TEST_TAX_ID_ID = 'txi_123';

    private $client;
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Stripe\StripeClient('sk_test_123', null, MOCK_URL);
        $this->service = new CustomerService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers'
        );
        $resources = $this->service->all();
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\Customer::class, $resources->data[0]);
    }

    public function testAllBalanceTransactions()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions'
        );
        $resources = $this->service->allBalanceTransactions(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $resources->data[0]);
    }

    public function testAllSources()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources'
        );
        $resources = $this->service->allSources(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
    }

    public function testAllTaxIds()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids'
        );
        $resources = $this->service->allTaxIds(self::TEST_RESOURCE_ID);
        static::assertInternalType('array', $resources->data);
        static::assertInstanceOf(\Stripe\TaxId::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers'
        );
        $resource = $this->service->create();
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testCreateBalanceTransaction()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions'
        );
        $resource = $this->service->createBalanceTransaction(self::TEST_RESOURCE_ID, [
            'amount' => 1234,
            'currency' => 'usd',
        ]);
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $resource);
    }

    public function testCreateSource()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources'
        );
        $resource = $this->service->createSource(self::TEST_RESOURCE_ID, ['source' => 'tok_123']);
    }

    public function testCreateTaxId()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids'
        );
        $resource = $this->service->createTaxId(self::TEST_RESOURCE_ID, [
            'type' => \Stripe\TaxId::TYPE_EU_VAT,
            'value' => '11111',
        ]);
        static::assertInstanceOf(\Stripe\TaxId::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testDeleteDiscount()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/discount'
        );
        $resource = $this->service->deleteDiscount(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Discount::class, $resource);
    }

    public function testDeleteSource()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = $this->service->deleteSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID);
    }

    public function testDeleteTaxId()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids/' . self::TEST_TAX_ID_ID
        );
        $resource = $this->service->deleteTaxId(self::TEST_RESOURCE_ID, self::TEST_TAX_ID_ID);
        static::assertInstanceOf(\Stripe\TaxId::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testRetrieveBalanceTransaction()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions/'
                . self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID
        );
        $resource = $this->service->retrieveBalanceTransaction(
            self::TEST_RESOURCE_ID,
            self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID
        );
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $resource);
    }

    public function testRetrieveSource()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = $this->service->retrieveSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID);
    }

    public function testRetrieveTaxId()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids/' . self::TEST_TAX_ID_ID
        );
        $resource = $this->service->retrieveTaxId(self::TEST_RESOURCE_ID, self::TEST_TAX_ID_ID);
        static::assertInstanceOf(\Stripe\TaxId::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testUpdateBalanceTransaction()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions/'
                . self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID
        );
        $resource = $this->service->updateBalanceTransaction(
            self::TEST_RESOURCE_ID,
            self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID,
            ['description' => 'new']
        );
        static::assertInstanceOf(\Stripe\CustomerBalanceTransaction::class, $resource);
    }

    public function testUpdateSource()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = $this->service->updateSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID, ['name' => 'name']);
    }

    public function testVerifySource()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID . '/verify'
        );
        $resource = $this->service->verifySource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID, ['amounts' => [32, 45]]);
    }
}
