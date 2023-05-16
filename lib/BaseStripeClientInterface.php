<?php

namespace Stripe;

/**
 * Interface for a Stripe client.
 */
interface BaseStripeClientInterface
{
    /**
     * Gets the API key used by the client to send requests.
     *
     * @return null|string the API key used by the client to send requests
     */
    public function getApiKey();

    /**
     * Gets the client ID used by the client in OAuth requests.
     *
     * @return null|string the client ID used by the client in OAuth requests
     */
    public function getClientId();

    /**
     * Gets the base URL for Stripe's API.
     *
     * @return string the base URL for Stripe's API
     */
    public function getApiBase();

    /**
     * Gets the base URL for Stripe's OAuth API.
     *
     * @return string the base URL for Stripe's OAuth API
     */
    public function getConnectBase();

    /**
     * Gets the base URL for Stripe's Files API.
     *
     * @return string the base URL for Stripe's Files API
     */
    public function getFilesBase();

    /**
     * Sends a raw request to Stripe's API. This is the lowest level method for interacting
     * with the Stripe API. This method is useful for interacting with endpoints that are not
     * covered yet in stripe-php.
     *
     * @param 'delete'|'get'|'post' $method the HTTP method
     * @param string $path the path of the request
     * @param array $params the parameters of the request
     * @param array $opts the special modifiers of the request
     *
     * @return \Stripe\ApiResponse
     */
    public function rawRequest($method, $path, $params, $opts);

    /**
     * Deserializes the raw JSON string returned by rawRequest into a similar class.
     *
     * @param string $json
     * @return \Stripe\StripeObject
     * */
    public function deserialize($json);
}
