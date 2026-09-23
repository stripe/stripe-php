<?php

// File generated from our OpenAPI spec

namespace Stripe\FinancialConnections;

/**
 * Stripe-issued localized Financial Connections consent text.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property (object{account?: string|\Stripe\Account, customer?: string|\Stripe\Customer, customer_account?: string, type: string}&\Stripe\StripeObject) $account_holder
 * @property string $consent_text The exact localized text that must be displayed before collecting affirmative consent.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property int $expires_at The exclusive time after which this Consent can no longer be used as launch evidence.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string $locale The BCP 47 locale used to render <code>consent_text</code>.
 */
class Consent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'financial_connections.consent';

    /**
     * Creates a Financial Connections <code>Consent</code> object for an account
     * holder.
     *
     * @param null|array{account_holder: array{account?: string, customer?: string, customer_account?: string, type: string}, expand?: string[], locale?: string} $params
     * @param null|array|string $options
     *
     * @return Consent the created resource
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
     * Retrieves the details of a Financial Connections <code>Consent</code>.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Consent
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
}
