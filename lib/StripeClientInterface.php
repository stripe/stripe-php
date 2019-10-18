<?php

namespace Stripe;

/**
 * Interface for a Stripe client.
 */
interface StripeClientInterface
{
    /**
     * Gets the API key used by the client to send requests.
     *
     * @return string|null The API key used by the client to send requests.
     */
    public function getApiKey();

    /**
     * Gets the client ID used by the client in OAuth requests.
     *
     * @return string|null The client ID used by the client in OAuth requests.
     */
    public function getClientId();

    /**
     * Gets the base URL for Stripe's API.
     *
     * @return string The base URL for Stripe's API.
     */
    public function getApiBase();

    /**
     * Gets the base URL for Stripe's OAuth API.
     *
     * @return string The base URL for Stripe's OAuth API.
     */
    public function getConnectBase();

    /**
     * Gets the base URL for Stripe's Files API.
     *
     * @return string The base URL for Stripe's Files API.
     */
    public function getFilesBase();

    /**
     * Sends a request to Stripe's API.
     *
     * @param string $method The HTTP method.
     * @param string $path The path of the request.
     * @param array $params The parameters of the request.
     * @param array|\Stripe\RequestOptions $opts The special modifiers of the request.
     * @return \Stripe\StripeObject The object returned by Stripe's API.
     */
    public function request($method, $path, $params, $opts);
}
