<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A <code>payment_location</code> capability represents a capability for a Stripe account at a payment location.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The account that the capability enables functionality for.
 * @property string $capability The identifier for the capability.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string $location The payment location that the capability enables functionality for.
 * @property bool $requested Whether the capability has been requested.
 * @property null|int $requested_at Time when the capability was requested. Measured in seconds since the Unix epoch.
 * @property (object{currently_due: string[], disabled_reason: null|string, errors: (object{code: string, reason: string, requirement: string}&StripeObject)[]}&StripeObject) $requirements
 * @property string $status The status of the capability.
 */
class PaymentLocationCapability extends ApiResource
{
    const OBJECT_NAME = 'payment_location_capability';

    use ApiOperations\Update;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_PENDING = 'pending';
    const STATUS_UNREQUESTED = 'unrequested';

    /**
     * List all payment location capabilities associated with the payment location.
     *
     * @param null|array{expand?: string[], location: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<PaymentLocationCapability> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>payment_location</code> capability.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return PaymentLocationCapability
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a <code>payment_location</code> capability. Request or remove a
     * <code>payment_location</code> capability by updating its <code>requested</code>
     * parameter.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], location: string, requested: bool} $params
     * @param null|array|string $opts
     *
     * @return PaymentLocationCapability the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
