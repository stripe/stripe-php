<?php

namespace Stripe\Issuing;

/**
 * @internal
 *
 * @covers \Stripe\Issuing\Card
 */
final class CardTest extends \Stripe\TestCase
{
    use \Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ic_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards'
        );
        $resources = Card::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Card::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Card::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Card::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';

        $this->expectsRequest(
            'post',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        self::assertInstanceOf(Card::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = Card::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Card::class, $resource);
    }
}
