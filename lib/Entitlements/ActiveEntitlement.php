<?php

// File generated from our OpenAPI spec

namespace Stripe\Entitlements;

/**
 * An active entitlement describes access to a feature for a customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|\Stripe\Entitlements\Feature $feature The <a href="https://stripe.com/docs/api/entitlements/feature">Feature</a> that the customer is entitled to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $lookup_key A unique key you provide as your own system identifier. This may be up to 80 characters.
 */
class ActiveEntitlement extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'entitlements.active_entitlement';

    /**
     * Retrieve a list of active entitlements for a customer.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Entitlements\ActiveEntitlement> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieve an active entitlement.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Entitlements\ActiveEntitlement
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
