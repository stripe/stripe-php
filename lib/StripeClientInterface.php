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
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     *
     * @return \Stripe\StripeObject the object returned by Stripe's API
     */
    public function request($method, $path, $params, $opts);

    /**
     * Sends a request to Stripe's API, passing chunks of the streamed response
     * into a user-provided $readBodyChunkCallable callback.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param callable $readBodyChunkCallable a function that will be called
     * @param array $params the parameters of the request
     * @param array|\Stripe\Util\RequestOptions $opts the special modifiers of the request
     * with chunks of bytes from the body if the request is successful
     */
    public function requestStream($method, $path, $readBodyChunkCallable, $params, $opts);
}
