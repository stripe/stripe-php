<?php

namespace Stripe\V2;

use PHPUnit\Framework\TestCase;

class TestSearchResult extends SearchResult
{
    public $pages = [];
    public $requests = [];

    protected function _request($method, $url, $params = [], $options = null, $usage = [], $apiMode = 'v1')
    {
        $this->requests[] = [$method, $url, $params, $options, $apiMode];
        $page = \array_shift($this->pages);

        return [$page, \Stripe\Util\RequestOptions::parse(null)];
    }
}

class SearchResultTest extends TestCase
{
    public function testConvertsTaggedSearchResult()
    {
        $result = \Stripe\Util\Util::convertToStripeObject([
            'object' => 'v2.search_result',
            'data' => [],
            'next_page_url' => null,
            'previous_page_url' => null,
            'total_count' => 3,
        ], null, 'v2');

        self::assertInstanceOf(SearchResult::class, $result);
        self::assertSame(3, $result->total_count);
    }

    public function testAutoPagingReplaysOriginalPostBodyAcrossEmptyPages()
    {
        $params = [
            'query' => 'widgets',
            'sort' => ['name', '-created'],
            'limit' => 2,
            'future' => ['enabled' => true],
        ];
        $result = TestSearchResult::constructFrom([
            'object' => 'v2.search_result',
            'data' => [['id' => 'one']],
            'next_page_url' => '/v2/widgets/search?page=2',
            'total_count' => 2,
        ], null, 'v2');
        $result->setFilters($params);
        $result->pages = [
            ['object' => 'v2.search_result', 'data' => [], 'next_page_url' => '/v2/widgets/search?page=3', 'total_count' => 2],
            ['object' => 'v2.search_result', 'data' => [['id' => 'two']], 'next_page_url' => null, 'total_count' => 2],
        ];

        $ids = [];
        foreach ($result->autoPagingIterator() as $item) {
            $ids[] = $item->id;
        }

        self::assertSame(['one', 'two'], $ids);
        self::assertSame([
            ['post', '/v2/widgets/search?page=2', $params, null, 'v2'],
            ['post', '/v2/widgets/search?page=3', $params, null, 'v2'],
        ], $result->requests);
    }
}
