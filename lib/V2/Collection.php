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
 * @property TStripeObject[] $data
 */
class Collection extends \Stripe\StripeObject implements \Countable, \IteratorAggregate
{
    const OBJECT_NAME = 'list';

    use \Stripe\ApiOperations\Request;

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
        $page = $this->data;
        $next_page_url = $this->next_page_url;

        while (true) {
            foreach ($page as $item) {
                yield $item;
            }
            if (null === $next_page_url) {
                break;
            }

            list($response, $opts) = $this->_request(
                'get',
                $next_page_url,
                null,
                null,
                [],
                'v2'
            );
            $obj = \Stripe\Util\Util::convertToStripeObject($response, $opts, 'v2');
            /** @phpstan-ignore-next-line */
            $page = $obj->data;
            /** @phpstan-ignore-next-line */
            $next_page_url = $obj->next_page_url;
        }
    }
}
