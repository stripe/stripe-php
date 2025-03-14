<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\CreditNote
 */
final class CreditNoteTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'cn_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes'
        );
        $resources = CreditNote::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(CreditNote::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID
        );
        $resource = CreditNote::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(CreditNote::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/credit_notes'
        );
        $resource = CreditNote::create([
            'amount' => 100,
            'invoice' => 'in_132',
            'reason' => 'duplicate',
        ]);
        self::assertInstanceOf(CreditNote::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = CreditNote::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(CreditNote::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID
        );
        $resource = CreditNote::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(CreditNote::class, $resource);
    }

    public function testCanPreview()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/preview'
        );
        $resource = CreditNote::preview([
            'amount' => 100,
            'invoice' => 'in_123',
        ]);
        self::assertInstanceOf(CreditNote::class, $resource);
    }

    public function testCanVoidCreditNote()
    {
        $creditNote = CreditNote::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/credit_notes/' . $creditNote->id . '/void'
        );
        $resource = $creditNote->voidCreditNote();
        self::assertInstanceOf(CreditNote::class, $resource);
        self::assertSame($resource, $creditNote);
    }

    public function testCanListLines()
    {
        $this->expectsRequest(
            'get',
            '/v1/credit_notes/' . self::TEST_RESOURCE_ID . '/lines'
        );
        $resources = CreditNote::allLines(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
    }
}
