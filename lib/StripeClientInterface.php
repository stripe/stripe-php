<?php

namespace Stripe;

/**
 * Interface for a Stripe client.
 */
interface StripeClientInterface extends BaseStripeClientInterface
{
    /**
     * Sends a request to Stripe's API.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|Util\RequestOptions $opts the special modifiers of the request
     *
     * @return StripeObject the object returned by Stripe's API
     */
    public function request($method, $path, $params, $opts);

    /**
     * Sends a request to Stripe's API and expects to return a SearchResult.
     *
     * @param 'get' $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|Util\RequestOptions $opts the special modifiers of the request
     *
     * @return SearchResult of ApiResources
     */
    public function requestSearchResult($method, $path, $params, $opts);

    /**
     * Sends a request to Stripe's API and expects to return a Collection|V2\Collection.
     *
     * @param 'get' $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array|Util\RequestOptions $opts the special modifiers of the request
     *
     * @return Collection|V2\Collection of ApiResources
     */
    public function requestCollection($method, $path, $params, $opts);
}
