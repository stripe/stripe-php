<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * <code>ExchangeRate</code> objects allow you to determine the rates that Stripe is currently
 * using to convert from one currency to another. Since this number is variable
 * throughout the day, there are various reasons why you might want to know the current
 * rate (for example, to dynamically price an item for a user with a default
 * payment in a foreign currency).
 *
 * Please refer to our <a href="https://stripe.com/docs/fx-rates">Exchange Rates API</a> guide for more details.
 *
 * <em>[Note: this integration path is supported but no longer recommended]</em> Additionally,
 * you can guarantee that a charge is made with an exchange rate that you expect is
 * current. To do so, you must pass in the exchange_rate to charges endpoints. If the
 * value is no longer up to date, the charge won't go through. Please refer to our
 * <a href="https://stripe.com/docs/exchange-rates">Using with charges</a> guide for more details.
 *
 * -----
 *
 *
 *
 * <em>This Exchange Rates API is a Beta Service and is subject to Stripe's terms of service. You may use the API solely for the purpose of transacting on Stripe. For example, the API may be queried in order to:</em>
 *
 * - <em>localize prices for processing payments on Stripe</em>
 * - <em>reconcile Stripe transactions</em>
 * - <em>determine how much money to send to a connected account</em>
 * - <em>determine app fees to charge a connected account</em>
 *
 * <em>Using this Exchange Rates API beta for any purpose other than to transact on Stripe is strictly prohibited and constitutes a violation of Stripe's terms of service.</em>
 *
 * @property string $id Unique identifier for the object. Represented as the three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a> in lowercase.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $rates Hash where the keys are supported currencies and the values are the exchange rate at which the base id currency converts to the key currency.
 */
class ExchangeRate extends ApiResource
{
    const OBJECT_NAME = 'exchange_rate';

    /**
     * Returns a list of objects that contain the rates at which foreign currencies are
     * converted to one another. Only shows the currencies for which Stripe supports.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\ExchangeRate> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the exchange rates from the given currency to every supported
     * currency.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\ExchangeRate
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
