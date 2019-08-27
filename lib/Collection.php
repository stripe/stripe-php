<?php

namespace Stripe;

/**
 * Class Collection
 *
 * @property string $object
 * @property string $url
 * @property bool $has_more
 * @property mixed $data
 *
 * @package Stripe
 */
class Collection extends StripeObject implements \IteratorAggregate
{
    const OBJECT_NAME = "list";

    use ApiOperations\Request;

    protected $filters = [];

    /**
     * @return string The base URL for the given class.
     */
    public static function baseUrl()
    {
        return Stripe::$apiBase;
    }

    /**
     * Returns the filters.
     *
     * @param array $filters The filters.
     */
    public function getFilters($filters)
    {
        return $this->filters;
    }

    /**
     * Sets the filters.
     *
     * @return array The filters.
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    public function offsetGet($k)
    {
        if (is_string($k)) {
            return parent::offsetGet($k);
        } else {
            $msg = "You tried to access the {$k} index, but Collection " .
                   "types only support string keys. (HINT: List calls " .
                   "return an object with a `data` (which is the data " .
                   "array). You likely want to call ->data[{$k}])";
            throw new \InvalidArgumentException($msg);
        }
    }

    public function all($params = null, $opts = null)
    {
        self::_validateParams($params);
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        list($response, $opts) = $this->_request('get', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response, $opts);
        if (!($obj instanceof \Stripe\Collection)) {
            throw new \Stripe\Error\Api(
                'Expected type ' . \Stripe\Collection::class . ', got "' . get_class($obj) . '" instead.'
            );
        }
        $obj->setFilters($params);
        return $obj;
    }

    public function create($params = null, $opts = null)
    {
        self::_validateParams($params);
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        return Util\Util::convertToStripeObject($response, $opts);
    }

    public function retrieve($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        list($url, $params) = $this->extractPathAndUpdateParams($params);

        $id = Util\Util::utf8($id);
        $extn = urlencode($id);
        list($response, $opts) = $this->_request(
            'get',
            "$url/$extn",
            $params,
            $opts
        );
        return Util\Util::convertToStripeObject($response, $opts);
    }

    /**
     * @return \ArrayIterator An iterator that can be used to iterate
     *    across objects in the current page.
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * @return \Generator|StripeObject[] A generator that can be used to
     *    iterate across all objects across all pages. As page boundaries are
     *    encountered, the next page will be fetched automatically for
     *    continued iteration.
     */
    public function autoPagingIterator()
    {
        $page = $this;
        $params = $this->_requestParams;

        while (true) {
            foreach ($page as $item) {
                yield $item;
            }

            $page = $page->nextPage();

            if ($page->isEmpty()) {
                break;
            }
        }
    }

    /**
     * Returns an empty collection. This is returned from {@see nextPage()}
     * when we know that there isn't a next page in order to replicate the
     * behavior of the API when it attempts to return a page beyond the last.
     *
     * @param array|string|null $opts
     * @return Collection
     */
    public static function emptyCollection($opts = null)
    {
        return Collection::constructFrom(['data' => []], $opts);
    }

    /**
     * Returns true if the page object contains no element.
     *
     * @return boolean
     */
    public function isEmpty()
    {
        return empty($this->data);
    }

    /**
     * Fetches the next page in the resource list (if there is one).
     *
     * This method will try to respect the limit of the current page. If none
     * was given, the default limit will be fetched again.
     *
     * @param array|null $params
     * @param array|string|null $opts
     * @return Collection
     */
    public function nextPage($params = null, $opts = null)
    {
        if (!$this->has_more) {
            return static::emptyCollection($opts);
        }

        $lastId = end($this->data)->id;

        $params = array_merge(
            $this->filters,
            ['starting_after' => $lastId],
            $params ?: []
        );

        return $this->all($params, $opts);
    }

    /**
     * Fetches the previous page in the resource list (if there is one).
     *
     * This method will try to respect the limit of the current page. If none
     * was given, the default limit will be fetched again.
     *
     * @param array|null $params
     * @param array|string|null $opts
     * @return Collection
     */
    public function previousPage($params = null, $opts = null)
    {
        $firstId = $this->data[0]->id;

        $params = array_merge(
            $this->filters,
            ['ending_before' => $firstId],
            $params ?: []
        );

        return $this->all($params, $opts);
    }

    private function extractPathAndUpdateParams($params)
    {
        $url = parse_url($this->url);
        if (!isset($url['path'])) {
            throw new Error\Api("Could not parse list url into parts: $url");
        }

        if (isset($url['query'])) {
            // If the URL contains a query param, parse it out into $params so they
            // don't interact weirdly with each other.
            $query = [];
            parse_str($url['query'], $query);
            $params = array_merge($params ?: [], $query);
        }

        return [$url['path'], $params];
    }
}
