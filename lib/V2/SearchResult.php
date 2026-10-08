<?php

namespace Stripe\V2;

/**
 * A page of API v2 search results.
 *
 * @template TStripeObject of \Stripe\StripeObject
 *
 * @template-implements \IteratorAggregate<TStripeObject>
 *
 * @property TStripeObject[] $data
 * @property null|string $next_page_url
 * @property null|string $previous_page_url
 * @property int $total_count
 */
class SearchResult extends \Stripe\StripeObject implements \Countable, \IteratorAggregate
{
    const OBJECT_NAME = 'v2.search_result';

    use \Stripe\ApiOperations\Request;

    /**
     * @return string the base URL for the given class
     */
    public static function baseUrl()
    {
        return \Stripe\Stripe::$apiBase;
    }

    private $filters = [];

    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    #[\ReturnTypeWillChange]
    public function count()
    {
        return \count($this->data);
    }

    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    public function autoPagingIterator()
    {
        $page = $this->data;
        $next_page_url = $this->next_page_url;

        while (true) {
            foreach ($page as $item) {
                yield $item;
            }
            if (null === $next_page_url) {
                break;
            }

            $params = $this->filters;
            unset($params['limit']);
            list($response, $opts) = $this->_request(
                'post',
                $next_page_url,
                $params,
                null,
                [],
                'v2'
            );
            $obj= \Stripe\Util\Util::convertToStripeObject($response, $opts, 'v2');
            /** @phpstan-ignore-next-line */
            $page = $obj->data;
            /** @phpstan-ignore-next-line */
            $next_page_url = $obj->next_page_url;
        }
    }
}
