<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Customer
 */
final class CustomerTest extends \Stripe\TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'cus_123';
    const TEST_SOURCE_ID = 'ba_123';
    const TEST_TAX_ID_ID = 'txi_123';
    const TEST_CUSTOMER_BALANCE_TRANSACTION_ID = 'cbtxn_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers'
        );
        $resources = Customer::all();
        static::compatAssertIsArray($resources->data);
        static::assertInstanceOf(\Stripe\Customer::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers'
        );
        $resource = Customer::create();
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/customers/' . $resource->id
        );
        $resource->save();
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = Customer::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testIsDeletable()
    {
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . $resource->id
        );
        $resource->delete();
        static::assertInstanceOf(\Stripe\Customer::class, $resource);
    }

    public function testCanDeleteDiscount()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'delete',
            '/v1/customers/' . $customer->id . '/discount'
        );
        $customer->deleteDiscount();
        static::assertSame($customer->discount, null);
    }

    public function testCanCreateSource()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources'
        );
        $resource = Customer::createSource(self::TEST_RESOURCE_ID, ['source' => 'btok_123']);
    }

    public function testCanRetrieveSource()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = Customer::retrieveSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID);
    }

    public function testCanUpdateSource()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = Customer::updateSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID, ['name' => 'name']);
        // stripe-mock returns a Card on this method and not a bank account
        static::assertInstanceOf(\Stripe\Card::class, $resource);
    }

    public function testCanDeleteSource()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = Customer::deleteSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID);
    }

    public function testCanListSources()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources'
        );
        $resources = Customer::allSources(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
    }

    public function testSerializeSourceString()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'customer',
        ], null);
        $obj->source = 'tok_visa';

        $expected = [
            'source' => 'tok_visa',
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testSerializeSourceMap()
    {
        $obj = Util\Util::convertToStripeObject([
            'object' => 'customer',
        ], null);
        $obj->source = [
            'object' => 'card',
            'number' => '4242424242424242',
            'exp_month' => 12,
            'exp_year' => 2032,
        ];

        $expected = [
            'source' => [
                'object' => 'card',
                'number' => '4242424242424242',
                'exp_month' => 12,
                'exp_year' => 2032,
            ],
        ];
        static::assertSame($expected, $obj->serializeParameters());
    }

    public function testCanCreateTaxId()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids'
        );
        $resource = Customer::createTaxId(self::TEST_RESOURCE_ID, [
            'type' => TaxId::TYPE_EU_VAT,
            'value' => '11111',
        ]);
    }

    public function testCanRetrieveTaxId()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids/' . self::TEST_TAX_ID_ID
        );
        $resource = Customer::retrieveTaxId(self::TEST_RESOURCE_ID, self::TEST_TAX_ID_ID);
    }

    public function testCanDeleteTaxId()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids/' . self::TEST_TAX_ID_ID
        );
        $resource = Customer::deleteTaxId(self::TEST_RESOURCE_ID, self::TEST_TAX_ID_ID);
    }

    public function testCanListTaxIds()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids'
        );
        $resources = Customer::allTaxIds(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
    }

    public function testCanCreateBalanceTransaction()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions'
        );
        $resource = Customer::createBalanceTransaction(self::TEST_RESOURCE_ID, [
            'amount' => 1234,
            'currency' => 'usd',
        ]);
    }

    public function testCanRetrieveBalanceTransaction()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions/' . self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID
        );
        $resource = Customer::retrieveBalanceTransaction(self::TEST_RESOURCE_ID, self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID);
    }

    public function testCanUpdateBalanceTransaction()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions/' . self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID
        );
        $resource = Customer::updateBalanceTransaction(self::TEST_RESOURCE_ID, self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID, ['description' => 'new']);
    }

    public function testCanListCustomerBalanceTransactions()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions'
        );
        $resources = Customer::allBalanceTransactions(self::TEST_RESOURCE_ID);
        static::compatAssertIsArray($resources->data);
    }
}
