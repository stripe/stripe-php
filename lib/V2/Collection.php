<?php

namespace Stripe\V2;

/**
 * Class V2 Collection.
 *
 * @template TStripeObject of \Stripe\StripeObject
 * @template-implements \IteratorAggregate<TStripeObject>
 *
 * @property null|string $next_page_url
 * @property null|string $previous_page_url
 * @property null|string $next_page
 * @property null|string $previous_page
 * @property TStripeObject[] $data
 */
class Collection extends \Stripe\StripeObject implements \Countable, \IteratorAggregate
{
    const OBJECT_NAME = 'list';

    use \Stripe\ApiOperations\Request;

    /** @var array{string, mixed} */
    protected $lastRequest = [];

     /**
     * Returns last request details.
     *
     * @return array{string, mixed} an array containing last request url and params
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }

    /**
     * Sets last request details.
     *
     * @param string $url URL path of the last request
     * @param array $params params used to make the last request
     */
    public function setLastRequest($url, $params)
    {
        $this->lastRequest = [$url, $params];
    }

    /**
     * @return string the base URL for the given class
     */
    public static function baseUrl()
    {
        return \Stripe\Stripe::$apiBase;
    }

    /**
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($k)
    {
        if (\is_string($k)) {
            return parent::offsetGet($k);
        }
        $msg = "You tried to access the {$k} index, but V2Collection " .
            'types only support string keys. (HINT: List calls ' .
            'return an object with a `data` (which is the data ' .
            "array). You likely want to call ->data[{$k}])";

        throw new \Stripe\Exception\InvalidArgumentException($msg);
    }

    /**
     * Returns an empty collection. This is returned from {@see nextPage()}
     * when we know that there isn't a next page in order to replicate the
     * behavior of the API when it attempts to return a page beyond the last.
     *
     * @param null|array|string $opts
     *
     * @return Collection
     */
    public static function emptyCollection($opts = null)
    {
        return Collection::constructFrom(['data' => []], $opts);
    }

    /**
     * @return int the number of objects in the current page
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return \count($this->data);
    }

    /**
     * @return \ArrayIterator an iterator that can be used to iterate
     *    across objects in the current page
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * @return \ArrayIterator an iterator that can be used to iterate
     *    backwards across objects in the current page
     */
    public function getReverseIterator()
    {
        return new \ArrayIterator(\array_reverse($this->data));
    }

    /**
     * @throws \Stripe\Exception\ApiErrorException
     *
     * @return \Generator|TStripeObject[] A generator that can be used to
     *    iterate across all objects across all pages. As page boundaries are
     *    encountered, the next page will be fetched automatically for
     *    continued iteration.
     */
    public function autoPagingIterator()
    {
        $page = $this;

        while (true) {
            foreach ($page->data as $item) {
                yield $item;
            }
            if (!isset($page->next_page) && !isset($page->next_page_url)) {
                break;
            }

            $page = $page->fetch_next_page();
        }
    }

    private function fetch_next_page()
    {
        if (!isset($this->next_page) && !isset($this->next_page_url)) {
            return static::emptyCollection([]);
        }

        if (isset($this->next_page)) {
            list($url, $params) = $this->getLastRequest();
            $new_params = $params;
            $new_params['page'] = $this->next_page;
            list($response, $opts) = $this->_request(
                'get',
                $url,
                $new_params,
                null,
                [],
                'v2'
            );
            return \Stripe\Util\Util::convertToStripeObject($response, $opts, 'v2');
        } else {
            list($response, $opts) = $this->_request(
                'get',
                $this->next_page_url,
                [],
                null,
                [],
                'v2'
            );
            return \Stripe\Util\Util::convertToStripeObject($response, $opts, 'v2');
        }
    }
}
