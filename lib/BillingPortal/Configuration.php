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
 * @property (object{headline: null|string, privacy_policy_url: null|string, terms_of_service_url: null|string}&\Stripe\StripeObject) $business_profile
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $default_return_url The default URL to redirect customers to when they click on the portal's link to return to your website. This can be <a href="https://stripe.com/docs/api/customer_portal/sessions/create#create_portal_session-return_url">overriden</a> when creating the session.
 * @property (object{customer_update: (object{allowed_updates: string[], enabled: bool}&\Stripe\StripeObject), invoice_history: (object{enabled: bool}&\Stripe\StripeObject), payment_method_update: (object{enabled: bool}&\Stripe\StripeObject), subscription_cancel: (object{cancellation_reason: (object{enabled: bool, options: string[]}&\Stripe\StripeObject), enabled: bool, mode: string, proration_behavior: string}&\Stripe\StripeObject), subscription_update: (object{default_allowed_updates: string[], enabled: bool, products?: null|(object{prices: string[], product: string}&\Stripe\StripeObject)[], proration_behavior: string, schedule_at_period_end: (object{conditions: (object{type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $features
 * @property bool $is_default Whether the configuration is the default. If <code>true</code>, this configuration can be managed in the Dashboard and portal sessions will use this configuration unless it is overriden when creating the session.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{enabled: bool, url: null|string}&\Stripe\StripeObject) $login_page
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
     * @param null|array{business_profile?: array{headline?: null|string, privacy_policy_url?: string, terms_of_service_url?: string}, default_return_url?: null|string, expand?: string[], features: array{customer_update?: array{allowed_updates?: null|string[], enabled: bool}, invoice_history?: array{enabled: bool}, payment_method_update?: array{enabled: bool}, subscription_cancel?: array{cancellation_reason?: array{enabled: bool, options: null|string[]}, enabled: bool, mode?: string, proration_behavior?: string}, subscription_update?: array{default_allowed_updates?: null|string[], enabled: bool, products?: null|array{prices: string[], product: string}[], proration_behavior?: string, schedule_at_period_end?: array{conditions?: array{type: string}[]}}}, login_page?: array{enabled: bool}, metadata?: \Stripe\StripeObject} $params
     * @param null|array|string $options
     *
     * @return Configuration the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{active?: bool, ending_before?: string, expand?: string[], is_default?: bool, limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Configuration> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @param null|array{active?: bool, business_profile?: array{headline?: null|string, privacy_policy_url?: null|string, terms_of_service_url?: null|string}, default_return_url?: null|string, expand?: string[], features?: array{customer_update?: array{allowed_updates?: null|string[], enabled?: bool}, invoice_history?: array{enabled: bool}, payment_method_update?: array{enabled: bool}, subscription_cancel?: array{cancellation_reason?: array{enabled: bool, options?: null|string[]}, enabled?: bool, mode?: string, proration_behavior?: string}, subscription_update?: array{default_allowed_updates?: null|string[], enabled?: bool, products?: null|array{prices: string[], product: string}[], proration_behavior?: string, schedule_at_period_end?: array{conditions?: null|array{type: string}[]}}}, login_page?: array{enabled: bool}, metadata?: null|\Stripe\StripeObject} $params
     * @param null|array|string $opts
     *
     * @return Configuration the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
