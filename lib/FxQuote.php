<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * The FX Quotes API provides three functions:
 * - View Stripe's current exchange rate for any given currency pair.
 * - Extend quoted rates for a 1-hour period or a 24-hour period, minimizing uncertainty from FX fluctuations.
 * - Preview the FX fees Stripe will charge on your FX transaction, allowing you to anticipate specific settlement amounts before payment costs.
 *
 * <a href="/payments/currencies/localize-prices/fx-quotes-api">View the docs</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the quote was created, measured in seconds since the Unix epoch.
 * @property string $lock_duration The duration the exchange rate quote remains valid from creation time. Allowed values are none, hour, and day. Note that for the test mode API available in alpha, you can request an extended quote, but it won't be usable for any transactions.
 * @property null|int $lock_expires_at <p>Time at which the quote will expire, measured in seconds since the Unix epoch.</p><p>If lock_duration is set to ‘none’ this field will be set to null.</p>
 * @property string $lock_status <p>Lock status of the quote. Transitions from active to expired once past the lock_expires_at timestamp.</p><p>Can return value none, active, or expired.</p>
 * @property StripeObject $rates Information about the rates.
 * @property string $to_currency The currency to convert into, typically this is the currency that you want to settle to your Stripe balance. Three-letter ISO currency code, in lowercase. Must be a supported currency.
 * @property (object{payment: null|(object{destination: null|string, on_behalf_of: null|string}&StripeObject), transfer: null|(object{destination: string}&StripeObject), type: string}&StripeObject) $usage
 */
class FxQuote extends ApiResource
{
    const OBJECT_NAME = 'fx_quote';

    const LOCK_DURATION_DAY = 'day';
    const LOCK_DURATION_FIVE_MINUTES = 'five_minutes';
    const LOCK_DURATION_HOUR = 'hour';
    const LOCK_DURATION_NONE = 'none';

    const LOCK_STATUS_ACTIVE = 'active';
    const LOCK_STATUS_EXPIRED = 'expired';
    const LOCK_STATUS_NONE = 'none';

    /**
     * Creates an FX Quote object.
     *
     * @param null|array{expand?: string[], from_currencies: string[], lock_duration: string, to_currency: string, usage?: array{payment?: array{destination?: string, on_behalf_of?: string}, transfer?: array{destination: string}, type: string}} $params
     * @param null|array|string $options
     *
     * @return FxQuote the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Returns a list of FX quotes that have been issued. The FX quotes are returned in
     * sorted order, with the most recent FX quotes appearing first.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<FxQuote> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieve an FX Quote object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return FxQuote
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
}
