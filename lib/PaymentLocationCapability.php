<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Payment Location Capability represents a capability for a Stripe account at a Payment Location.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $account The account for which the capability enables functionality.
 * @property string $capability The identifier for the capability.
 * @property string $location The payment location for which the capability enables functionality.
 * @property bool $requested Whether the capability has been requested.
 * @property null|int $requested_at Time at which the capability was requested. Measured in seconds since the Unix epoch.
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
     * Updates a specified Payment Location Capability. Request or remove a payment
     * location capability by updating its <code>requested</code> parameter.
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
