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
     * Gets the Stripe account ID used by the client to send requests.
     *
     * @return null|string the Stripe account ID used by the client to send requests
     */
    public function getStripeAccount();

    /**
     * Gets the Stripe Context ID used by the client to send requests.
     *
     * @return null|string the Stripe Context ID used by the client to send requests
     */
    public function getStripeContext();

    /**
     * Gets the Stripe Version used by the client to send requests.
     *
     * @return null|string the Stripe Context ID used by the client to send requests
     */
    public function getStripeVersion();

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
     * Gets the base URL for Stripe's Meter Events API.
     *
     * @return string the base URL for Stripe's Meter Events API
     */
    public function getMeterEventsBase();
}
