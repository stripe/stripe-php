<?php

namespace Stripe;

class CollectionTest extends TestCase
{
    /** @var \Stripe\Collection */
    private $fixture;

    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->fixture = Collection::constructFrom([
            'data' => [['id' => 1]],
            'has_more' => true,
            'url' => '/things',
        ]);
    }

    /**
     * @expectedException \Stripe\Exception\InvalidArgumentException
     * @expectedExceptionMessageRegExp /You tried to access the \d index/
     */
    public function testOffsetGetNumericIndex()
    {
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
                'data' => [['id' => 1]],
                'has_more' => true,
                'url' => '/things',
            ]
        );

        $resources = $this->fixture->all();
        $this->assertTrue(is_array($resources->data));
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
                'id' => 1,
            ]
        );

        $this->fixture->retrieve(1);
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
                'id' => 2,
            ]
        );

        $this->fixture->create([
            'foo' => 'bar',
        ]);
    }

    public function testCanIterate()
    {
        $seen = [];
        foreach ($this->fixture as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame([1], $seen);
    }

    public function testSupportsIteratorToArray()
    {
        $seen = [];
        foreach (iterator_to_array($this->fixture) as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame([1], $seen);
    }

    public function testProvidesAutoPagingIterator()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'starting_after' => 1,
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => 2], ['id' => 3]],
                'has_more' => false,
            ]
        );

        $seen = [];
        foreach ($this->fixture->autoPagingIterator() as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame([1, 2, 3], $seen);
    }

    public function testAutoPagingIteratorSupportsIteratorToArray()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'starting_after' => 1,
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => 2], ['id' => 3]],
                'has_more' => false,
            ]
        );

        $seen = [];
        foreach (iterator_to_array($this->fixture->autoPagingIterator()) as $item) {
            array_push($seen, $item['id']);
        }

        $this->assertSame([1, 2, 3], $seen);
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
                'id' => 2,
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
        $this->assertEquals([], $emptyCollection->data);
    }

    public function testIsEmpty()
    {
        $empty = Collection::constructFrom(['data' => []]);
        $this->assertTrue($empty->isEmpty());

        $notEmpty = Collection::constructFrom(['data' => [['id' => 1]]]);
        $this->assertFalse($notEmpty->isEmpty());
    }

    public function testNextPage()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'starting_after' => 1,
            ],
            null,
            false,
            [
                'object' => 'list',
                'data' => [['id' => 2], ['id' => 3]],
                'has_more' => false,
            ]
        );

        $nextPage = $this->fixture->nextPage();
        $ids = [];
        foreach ($nextPage->data as $element) {
            array_push($ids, $element['id']);
        }
        $this->assertEquals([2, 3], $ids);
    }

    public function testPreviousPage()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'ending_before' => 1,
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
        $this->assertEquals([], $previousPage->data);
    }
}
