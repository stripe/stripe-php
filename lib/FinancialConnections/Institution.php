<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * An institution represents a financial institution to which an end user can connect using the Financial Connections authentication flow.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $features
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $name The name of this institution.
 * @property string[] $routing_numbers A list of routing numbers which are known to correspond to this institution. Due to the many to many relationship between institutions and routing numbers, this list may not be comprehensive and routing numbers may also be shared between institutions.
 * @property string $status The status of this institution in the Financial Connections authentication flow.
 * @property null|string $url A URL corresponding to this institution. This URL is also displayed in the authentication flow to help end users confirm that they are authenticating with the right institution.
 */
class Institution extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.institution';

    const STATUS_ACTIVE = 'active';
    const STATUS_DEGRADED = 'degraded';
    const STATUS_INACTIVE = 'inactive';

    /**
     * Returns a list of Financial Connections <code>Institution</code> objects.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\FinancialConnections\Institution> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the details of a Financial Connections <code>Institution</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\FinancialConnections\Institution
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
