<?php

namespace Stripe\ApiOperations;

/**
 * Trait for searchable resources.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait Search
{
    /**
     * @param string $searchUrl
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return \Stripe\SearchResult of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    protected static function _searchResource($searchUrl, $params = null, $opts = null)
    {
        return static::_requestPage($searchUrl, \Stripe\SearchResult::class, $params, $opts);
    }
}
