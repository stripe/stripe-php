<?php

namespace Stripe;

class CustomerTest extends TestCase
{
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
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Customer", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\Customer", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers'
        );
        $resource = Customer::create();
        $this->assertInstanceOf("Stripe\\Customer", $resource);
    }

    public function testIsSaveable()
    {
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/customers/' . $resource->id
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\Customer", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = Customer::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\Customer", $resource);
    }

    public function testIsDeletable()
    {
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . $resource->id
        );
        $resource->delete();
        $this->assertInstanceOf("Stripe\\Customer", $resource);
    }

    public function testCanAddInvoiceItem()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoiceitems',
            [
                "amount" => 100,
                "currency" => "usd",
                "customer" => $customer->id
            ]
        );
        $resource = $customer->addInvoiceItem([
            "amount" => 100,
            "currency" => "usd"
        ]);
        $this->assertInstanceOf("Stripe\\InvoiceItem", $resource);
    }

    public function testCanListInvoices()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/invoices',
            ["customer" => $customer->id]
        );
        $resources = $customer->invoices();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Invoice", $resources->data[0]);
    }

    public function testCanListInvoiceItems()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/invoiceitems',
            ["customer" => $customer->id]
        );
        $resources = $customer->invoiceItems();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\InvoiceItem", $resources->data[0]);
    }

    public function testCanListCharges()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/charges',
            ["customer" => $customer->id]
        );
        $resources = $customer->charges();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\Charge", $resources->data[0]);
    }

    public function testCanUpdateSubscription()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'post',
            '/v1/customers/' . $customer->id . '/subscription',
            ["plan" => "plan"],
            null,
            false,
            [
                "object" => "subscription",
                "id" => "sub_foo"
            ]
        );
        $resource = $customer->updateSubscription(["plan" => "plan"]);
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
        $this->assertSame("sub_foo", $customer->subscription->id);
    }

    public function testCanCancelSubscription()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'delete',
            '/v1/customers/' . $customer->id . '/subscription',
            [],
            null,
            false,
            [
                "object" => "subscription",
                "id" => "sub_foo"
            ]
        );
        $resource = $customer->cancelSubscription();
        $this->assertInstanceOf("Stripe\\Subscription", $resource);
        $this->assertSame("sub_foo", $customer->subscription->id);
    }

    public function testCanDeleteDiscount()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'delete',
            '/v1/customers/' . $customer->id . '/discount'
        );
        $customer->deleteDiscount();
        $this->assertSame($customer->discount, null);
    }

    public function testCanCreateSource()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources'
        );
        $resource = Customer::createSource(self::TEST_RESOURCE_ID, ["source" => "btok_123"]);
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
        $resource = Customer::updateSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID, ["name" => "name"]);
        // stripe-mock returns a Card on this method and not a bank account
        $this->assertInstanceOf("Stripe\\Card", $resource);
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
        $this->assertTrue(is_array($resources->data));
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
        $this->assertSame($expected, $obj->serializeParameters());
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
        $this->assertSame($expected, $obj->serializeParameters());
    }

    public function testCanCreateTaxId()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/tax_ids'
        );
        $resource = Customer::createTaxId(self::TEST_RESOURCE_ID, [
            "type" => TaxId::TYPE_EU_VAT,
            "value" => "11111",
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
        $this->assertTrue(is_array($resources->data));
    }

    public function testCanCreateBalanceTransaction()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions'
        );
        $resource = Customer::createBalanceTransaction(self::TEST_RESOURCE_ID, [
            "amount" => 1234,
            "currency" => "usd",
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
        $resource = Customer::updateBalanceTransaction(self::TEST_RESOURCE_ID, self::TEST_CUSTOMER_BALANCE_TRANSACTION_ID, ["description" => "new"]);
    }

    public function testCanListCustomerBalanceTransactions()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/balance_transactions'
        );
        $resources = Customer::allBalanceTransactions(self::TEST_RESOURCE_ID);
        $this->assertTrue(is_array($resources->data));
    }
}
