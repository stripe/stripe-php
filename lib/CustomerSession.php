<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A Customer Session allows you to grant Stripe's frontend SDKs (like Stripe.js) client-side access
 * control over a Customer.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $client_secret <p>The client secret of this Customer Session. Used on the client to set up secure access to the given <code>customer</code>.</p><p>The client secret can be used to provide access to <code>customer</code> from your frontend. It should not be stored, logged, or exposed to anyone other than the relevant customer. Make sure that you have TLS enabled on any page that includes the client secret.</p>
 * @property null|\Stripe\StripeObject $components Configuration for the components supported by this Customer Session.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|\Stripe\Customer $customer The Customer the Customer Session was created for.
 * @property int $expires_at The timestamp at which this Customer Session will expire.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class CustomerSession extends ApiResource
{
    const OBJECT_NAME = 'customer_session';

    /**
     * Creates a Customer Session object that includes a single-use client secret that
     * you can use on your front-end to grant client-side API access for certain
     * customer resources.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\CustomerSession the created resource
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
}
