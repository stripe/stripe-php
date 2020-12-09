<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\Collection
 */
final class CollectionTest extends \PHPUnit\Framework\TestCase
{
    use TestHelper;

    /** @var \Stripe\Collection */
    private $fixture;

    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->fixture = Collection::constructFrom([
            'data' => [['id' => '1']],
            'has_more' => true,
            'url' => '/things',
        ]);
    }

    public function testOffsetGetNumericIndex()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp('/You tried to access the \\d index/');

        $this->fixture[0];
    }

    public function testCanList()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => '1']],
                'has_more' => true,
                'url' => '/things',
            ]
        );

        $resources = $this->fixture->all();
        static::assertInternalType('array', $resources->data);
    }

    public function testCanRetrieve()
    {
        $this->stubRequest(
            'GET',
            '/things/1',
            [],
            null,
            false,
            [
                'id' => '1',
            ]
        );

        $this->fixture->retrieve('1');
    }

    public function testCanCreate()
    {
        $this->stubRequest(
            'POST',
            '/things',
            [
                'foo' => 'bar',
            ],
            null,
            false,
            [
                'id' => '2',
            ]
        );

        $this->fixture->create([
            'foo' => 'bar',
        ]);
    }

    public function testCanCount()
    {
        $collection = Collection::constructFrom([
            'data' => [['id' => '1']],
        ]);
        static::assertCount(1, $collection);

        $collection = Collection::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
        ]);
        static::assertCount(3, $collection);
    }

    public function testCanIterate()
    {
        $collection = Collection::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
            'has_more' => true,
            'url' => '/things',
        ]);

        $seen = [];
        foreach ($collection as $item) {
            $seen[] = $item['id'];
        }

        static::assertSame(['1', '2', '3'], $seen);
    }

    public function testCanIterateBackwards()
    {
        $collection = Collection::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
            'has_more' => true,
            'url' => '/things',
        ]);

        $seen = [];
        foreach ($collection->getReverseIterator() as $item) {
            $seen[] = $item['id'];
        }

        static::assertSame(['3', '2', '1'], $seen);
    }

    public function testSupportsIteratorToArray()
    {
        $seen = [];
        foreach (\iterator_to_array($this->fixture) as $item) {
            $seen[] = $item['id'];
        }

        static::assertSame(['1'], $seen);
    }

    public function testProvidesAutoPagingIterator()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'starting_after' => '1',
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => '2'], ['id' => '3']],
                'has_more' => false,
            ]
        );

        $seen = [];
        foreach ($this->fixture->autoPagingIterator() as $item) {
            $seen[] = $item['id'];
        }

        static::assertSame(['1', '2', '3'], $seen);
    }

    public function testAutoPagingIteratorSupportsIteratorToArray()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'starting_after' => '1',
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => '2'], ['id' => '3']],
                'has_more' => false,
            ]
        );

        $seen = [];
        foreach (\iterator_to_array($this->fixture->autoPagingIterator()) as $item) {
            $seen[] = $item['id'];
        }

        static::assertSame(['1', '2', '3'], $seen);
    }

    public function testProvidesAutoPagingIteratorThatSupportsBackwardsPagination()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'ending_before' => '3',
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => '1'], ['id' => '2']],
                'has_more' => false,
            ]
        );

        $collection = Collection::constructFrom([
            'data' => [['id' => '3']],
            'has_more' => true,
            'url' => '/things',
        ]);
        $collection->setFilters(['ending_before' => '4']);

        $seen = [];
        foreach ($collection->autoPagingIterator() as $item) {
            $seen[] = $item['id'];
        }

        static::assertSame(['3', '2', '1'], $seen);
    }

    public function testHeaders()
    {
        $this->stubRequest(
            'POST',
            '/things',
            [
                'foo' => 'bar',
            ],
            [
                'Stripe-Account: acct_foo',
                'Idempotency-Key: qwertyuiop',
            ],
            false,
            [
                'id' => '2',
            ]
        );

        $this->fixture->create([
            'foo' => 'bar',
        ], [
            'stripe_account' => 'acct_foo',
            'idempotency_key' => 'qwertyuiop',
        ]);
    }

    public function testEmptyCollection()
    {
        $emptyCollection = Collection::emptyCollection();
        static::assertSame([], $emptyCollection->data);
    }

    public function testIsEmpty()
    {
        $empty = Collection::constructFrom(['data' => []]);
        static::assertTrue($empty->isEmpty());

        $notEmpty = Collection::constructFrom(['data' => [['id' => '1']]]);
        static::assertFalse($notEmpty->isEmpty());
    }

    public function testNextPage()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'starting_after' => '1',
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => '2'], ['id' => '3']],
                'has_more' => false,
            ]
        );

        $nextPage = $this->fixture->nextPage();
        $ids = [];
        foreach ($nextPage->data as $element) {
            $ids[] = $element['id'];
        }
        static::assertSame(['2', '3'], $ids);
    }

    public function testPreviousPage()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'ending_before' => '1',
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [],
                'has_more' => false,
            ]
        );

        $previousPage = $this->fixture->previousPage();
        static::assertSame([], $previousPage->data);
    }

    public function testFirst()
    {
        $collection = Collection::constructFrom([
            'data' => [
                ['content' => 'first'],
                ['content' => 'middle'],
                ['content' => 'last'],
            ],
        ]);
        static::assertSame('first', $collection->first()['content']);
    }

    public function testLast()
    {
        $collection = Collection::constructFrom([
            'data' => [
                ['content' => 'first'],
                ['content' => 'middle'],
                ['content' => 'last'],
            ],
        ]);
        static::assertSame('last', $collection->last()['content']);
    }
}
