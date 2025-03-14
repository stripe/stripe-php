<?php

namespace Stripe;

/**
 * @internal
 *
 * @covers \Stripe\Source
 */
final class SourceTest extends TestCase
{
    use TestHelper;

    const TEST_RESOURCE_ID = 'src_123';

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Source::class, $resource);
    }

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources'
        );
        $resource = Source::create([
            'type' => 'card',
        ]);
        self::assertInstanceOf(Source::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';
        $this->expectsRequest(
            'post',
            '/v1/sources/' . $resource->id
        );
        $resource->save();
        self::assertInstanceOf(Source::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = Source::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Source::class, $resource);
    }

    public function testCanSaveCardExpiryDate()
    {
        $response = [
            'id' => 'src_foo',
            'object' => 'source',
            'card' => [
                'exp_month' => 8,
                'exp_year' => 2019,
            ],
        ];
        $source = Source::constructFrom($response);

        $response['card']['exp_month'] = 12;
        $response['card']['exp_year'] = 2022;
        $this->stubRequest(
            'POST',
            '/v1/sources/src_foo',
            [
                'card' => [
                    'exp_month' => 12,
                    'exp_year' => 2022,
                ],
            ],
            null,
            false,
            $response
        );

        /** @var mixed $card */
        $card = $source->card;

        $card->exp_month = 12;
        $card->exp_year = 2022;
        $source->save();

        self::assertSame(12, $source['card']['exp_month']);
        self::assertSame(2022, $source['card']['exp_year']);
    }

    public function testIsDetachableWhenAttached()
    {
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $resource->customer = 'cus_123';
        $this->expectsRequest(
            'delete',
            '/v1/customers/cus_123/sources/' . $resource->id
        );
        $resource->detach();
        self::assertInstanceOf(Source::class, $resource);
    }

    public function testIsNotDetachableWhenUnattached()
    {
        $this->expectException(Exception\UnexpectedValueException::class);

        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $resource->detach();
    }

    public function testCanListSourceTransactionsDeprecated()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID . '/source_transactions'
        );
        $resources = Source::allSourceTransactions(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(SourceTransaction::class, $resources->data[0]);
    }

    public function testCanListSourceTransactions()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID . '/source_transactions'
        );
        $resources = Source::allSourceTransactions(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(SourceTransaction::class, $resources->data[0]);
    }

    public function testCanVerify()
    {
        $resource = Source::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/sources/' . $resource->id . '/verify'
        );
        $resource->verify(['values' => [32, 45]]);
        self::assertInstanceOf(Source::class, $resource);
    }
}
