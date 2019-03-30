<?php

namespace Stripe;

class CreditNoteTest extends TestCase
{
    const TEST_RESOURCE_ID = 'cn_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes'
        );
        $resources = CreditNote::all();
        $this->assertTrue(is_array($resources->data));
        $this->assertInstanceOf("Stripe\\CreditNote", $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID
        );
        $resource = CreditNote::retrieve(self::TEST_RESOURCE_ID);
        $this->assertInstanceOf("Stripe\\CreditNote", $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/credit_notes'
        );
        $resource = CreditNote::create([
            "amount" => 100,
            "invoice" => "in_132",
            "reason" => "duplicate",
        ]);
        $this->assertInstanceOf("Stripe\\CreditNote", $resource);
    }

    public function testIsSaveable()
    {
        $resource = CreditNote::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata["key"] = "value";
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . $resource->id
        );
        $resource->save();
        $this->assertInstanceOf("Stripe\\CreditNote", $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID
        );
        $resource = CreditNote::update(self::TEST_RESOURCE_ID, [
            "metadata" => ["key" => "value"],
        ]);
        $this->assertInstanceOf("Stripe\\CreditNote", $resource);
    }

    public function testCanVoidCreditNote()
    {
        $creditNote = CreditNote::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . $creditNote->id . '/void'
        );
        $resource = $creditNote->voidCreditNote();
        $this->assertInstanceOf("Stripe\\CreditNote", $resource);
        $this->assertSame($resource, $creditNote);
    }
}
