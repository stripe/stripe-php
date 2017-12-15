<?php

namespace Stripe;

class CustomerTest extends TestCase
{
    const TEST_RESOURCE_ID = 'cus_123';
    const TEST_SOURCE_ID = 'ba_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers'
        );
        $resources = Customer::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\Customer", get_class($resources->data[0]));
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->assertSame("Stripe\\Customer", get_class($resource));
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers'
        );
        $resource = Customer::create();
        $this->assertSame("Stripe\\Customer", get_class($resource));
    }

    public function testIsSaveable()
    {
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        $this->assertSame("Stripe\\Customer", get_class($resource));
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource = Customer::update(self::TEST_RESOURCE_ID, array(
            "metadata" => array("key" => "value"),
        ));
        $this->assertSame("Stripe\\Customer", get_class($resource));
    }

    public function testIsDeletable()
    {
        $resource = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID
        );
        $resource->delete();
        $this->assertSame("Stripe\\Customer", get_class($resource));
    }

    public function testCanAddInvoiceItem()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/invoiceitems',
            array(
                "amount" => 100,
                "currency" => "usd",
                "customer" => $customer->id
            )
        );
        $resource = $customer->addInvoiceItem(array(
            "amount" => 100,
            "currency" => "usd"
        ));
        $this->assertSame("Stripe\\InvoiceItem", get_class($resource));
    }

    public function testCanListInvoices()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/invoices',
            array("customer" => $customer->id)
        );
        $resources = $customer->invoices();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\Invoice", get_class($resources->data[0]));
    }

    public function testCanListInvoiceItems()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/invoiceitems',
            array("customer" => $customer->id)
        );
        $resources = $customer->invoiceItems();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\InvoiceItem", get_class($resources->data[0]));
    }

    public function testCanListCharges()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'get',
            '/v1/charges',
            array("customer" => $customer->id)
        );
        $resources = $customer->charges();
        $this->assertTrue(is_array($resources->data));
        $this->assertSame("Stripe\\Charge", get_class($resources->data[0]));
    }

    public function testCanUpdateSubscription()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'post',
            '/v1/customers/' . $customer->id . '/subscription',
            array("plan" => "plan"),
            null,
            false,
            array(
                "object" => "subscription",
                "id" => "sub_foo"
            )
        );
        $resource = $customer->updateSubscription(array("plan" => "plan"));
        $this->assertSame("Stripe\\Subscription", get_class($resource));
        $this->assertSame("sub_foo", $customer->subscription->id);
    }

    public function testCanCancelSubscription()
    {
        $customer = Customer::retrieve(self::TEST_RESOURCE_ID);
        $this->stubRequest(
            'delete',
            '/v1/customers/' . $customer->id . '/subscription',
            array(),
            null,
            false,
            array(
                "object" => "subscription",
                "id" => "sub_foo"
            )
        );
        $resource = $customer->cancelSubscription();
        $this->assertSame("Stripe\\Subscription", get_class($resource));
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
        $resource = Customer::createSource(self::TEST_RESOURCE_ID, array("source" => "btok_123"));
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
    }

    public function testCanRetrieveSource()
    {
        $this->expectsRequest(
            'get',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = Customer::retrieveSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID);
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
    }

    public function testCanUpdateSource()
    {
        $this->expectsRequest(
            'post',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = Customer::updateSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID, array("name" => "name"));
        // stripe-mock returns a Card on this method and not a bank account
        $this->assertSame("Stripe\\Card", get_class($resource));
    }

    public function testCanDeleteSource()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/' . self::TEST_RESOURCE_ID . '/sources/' . self::TEST_SOURCE_ID
        );
        $resource = Customer::deleteSource(self::TEST_RESOURCE_ID, self::TEST_SOURCE_ID);
        $this->assertSame("Stripe\\BankAccount", get_class($resource));
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
}
