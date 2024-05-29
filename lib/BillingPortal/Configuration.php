<?php

// File generated from our OpenAPI spec

namespace Stripe\BillingPortal;

/**
 * A portal configuration describes the functionality and behavior of a portal session.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the configuration is active and can be used to create portal sessions.
 * @property null|string|\Stripe\Application $application ID of the Connect Application that created the configuration.
 * @property \Stripe\StripeObject $business_profile
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $default_return_url The default URL to redirect customers to when they click on the portal's link to return to your website. This can be <a href="https://stripe.com/docs/api/customer_portal/sessions/create#create_portal_session-return_url">overriden</a> when creating the session.
 * @property \Stripe\StripeObject $features
 * @property bool $is_default Whether the configuration is the default. If <code>true</code>, this configuration can be managed in the Dashboard and portal sessions will use this configuration unless it is overriden when creating the session.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $login_page
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 */
class Configuration extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing_portal.configuration';

    use \Stripe\ApiOperations\Update;

    /**
     * Creates a configuration that describes the functionality and behavior of a
     * PortalSession.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BillingPortal\Configuration the created resource
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of configurations that describe the functionality of the customer
     * portal.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\BillingPortal\Configuration> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a configuration that describes the functionality of the customer
     * portal.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BillingPortal\Configuration
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a configuration that describes the functionality of the customer portal.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\BillingPortal\Configuration the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
