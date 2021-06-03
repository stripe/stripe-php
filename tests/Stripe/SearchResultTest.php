<?php

namespace Stripe;

/**
 * @internal
 * @covers \Stripe\SearchResult
 */
final class SearchResultTest extends \Stripe\TestCase
{
    use TestHelper;

    /** @var \Stripe\SearchResult */
    private $fixture;

    /**
     * @before
     */
    public function setUpFixture()
    {
        $this->fixture = SearchResult::constructFrom([
            'data' => [['id' => '1']],
            'has_more' => true,
            'url' => '/things',
            'next_page' => 'WzEuMl0=',
        ]);
    }

    public function testOffsetGetNumericIndex()
    {
        $this->expectException(\Stripe\Exception\InvalidArgumentException::class);
        $this->compatExpectExceptionMessageMatches('/You tried to access the \\d index/');

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
                'object' => 'search_result',
                'data' => [['id' => '1']],
                'has_more' => true,
                'url' => '/things',
            ]
        );

        $resources = $this->fixture->all();
        $this->compatAssertIsArray($resources->data);
    }

    public function testCanCount()
    {
        $SearchResult = SearchResult::constructFrom([
            'data' => [['id' => '1']],
        ]);
        static::assertCount(1, $SearchResult);

        $SearchResult = SearchResult::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
        ]);
        static::assertCount(3, $SearchResult);
    }

    public function testCanIterate()
    {
        $SearchResult = SearchResult::constructFrom([
            'data' => [['id' => '1'], ['id' => '2'], ['id' => '3']],
            'has_more' => true,
            'url' => '/things',
            'next_page' => 'WzEuMl0=',
        ]);

        $seen = [];
        foreach ($SearchResult as $item) {
            $seen[] = $item['id'];
        }

        static::assertSame(['1', '2', '3'], $seen);
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
                'page' => 'WzEuMl0=',
            ],
            null,
            false,
            [
                'object' => 'search_result',
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

    public function testAutoPagingIteratorReusesFilters()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'query' => 'metadata["foo"]:"bar"',
                'limit' => 3,
                'page' => 'WzEuMl0=',
            ],
            null,
            false,
            [
                'object' => 'search_result',
                'data' => [['id' => '2'], ['id' => '3']],
                'has_more' => false,
            ]
        );

        $this->fixture->setFilters([
            'query' => 'metadata["foo"]:"bar"',
            'limit' => 3,
        ]);

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
                'page' => 'WzEuMl0=',
            ],
            null,
            false,
            [
                'object' => 'search_result',
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

    public function testEmptySearchResult()
    {
        $emptySearchResult = SearchResult::emptySearchResult();
        static::assertSame([], $emptySearchResult->data);
    }

    public function testIsEmpty()
    {
        $empty = SearchResult::constructFrom(['data' => []]);
        static::assertTrue($empty->isEmpty());

        $notEmpty = SearchResult::constructFrom(['data' => [['id' => '1']]]);
        static::assertFalse($notEmpty->isEmpty());
    }

    public function testNextPage()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'page' => 'WzEuMl0=',
            ],
            null,
            false,
            [
                'object' => 'search_result',
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

    public function testNextPageReusesFilters()
    {
        $this->stubRequest(
            'GET',
            '/things',
            [
                'query' => 'metadata["foo"]:"bar"',
                'limit' => 3,
                'page' => 'WzEuMl0=',
            ],
            null,
            false,
            [
                'object' => 'search_result',
                'data' => [['id' => '2'], ['id' => '3']],
                'has_more' => false,
            ]
        );

        $this->fixture->setFilters([
            'query' => 'metadata["foo"]:"bar"',
            'limit' => 3,
        ]);

        $nextPage = $this->fixture->nextPage();
        $ids = [];
        foreach ($nextPage->data as $element) {
            $ids[] = $element['id'];
        }
        static::assertSame(['2', '3'], $ids);
    }

    public function testFirst()
    {
        $SearchResult = SearchResult::constructFrom([
            'data' => [
                ['content' => 'first'],
                ['content' => 'middle'],
                ['content' => 'last'],
            ],
        ]);
        static::assertSame('first', $SearchResult->first()['content']);
    }

    public function testLast()
    {
        $SearchResult = SearchResult::constructFrom([
            'data' => [
                ['content' => 'first'],
                ['content' => 'middle'],
                ['content' => 'last'],
            ],
        ]);
        static::assertSame('last', $SearchResult->last()['content']);
    }
}
