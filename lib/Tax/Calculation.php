<?php

// File generated from our OpenAPI spec

namespace Stripe\Tax;

/**
 * A Tax Calculation allows you to calculate the tax to collect from your customer.
 *
 * Related guide: <a href="https://stripe.com/docs/tax/custom">Calculate tax in your custom payment flow</a>
 *
 * @property null|string $id Unique identifier for the calculation.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount_total Total amount after taxes in the <a href="https://stripe.com/docs/currencies#zero-decimal">smallest currency unit</a>.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|string $customer The ID of an existing <a href="https://stripe.com/docs/api/customers/object">Customer</a> used for the resource.
 * @property (object{address: null|(object{city: null|string, country: string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject), address_source: null|string, ip_address: null|string, tax_ids: (object{type: string, value: string}&\Stripe\StripeObject)[], taxability_override: string}&\Stripe\StripeObject) $customer_details
 * @property null|int $expires_at Timestamp of date at which the tax calculation will expire.
 * @property null|\Stripe\Collection<CalculationLineItem> $line_items The list of items the customer is purchasing.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{address: (object{city: null|string, country: string, line1: null|string, line2: null|string, postal_code: null|string, state: null|string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $ship_from_details The details of the ship from location, such as the address.
 * @property null|(object{amount: int, amount_tax: int, shipping_rate?: string, tax_behavior: string, tax_breakdown?: ((object{amount: int, jurisdiction: (object{country: string, display_name: string, level: string, state: null|string}&\Stripe\StripeObject), sourcing: string, tax_rate_details: null|(object{display_name: string, percentage_decimal: string, tax_type: string}&\Stripe\StripeObject), taxability_reason: string, taxable_amount: int}&\Stripe\StripeObject))[], tax_code: string}&\Stripe\StripeObject) $shipping_cost The shipping cost details for the calculation.
 * @property int $tax_amount_exclusive The amount of tax to be collected on top of the line item prices.
 * @property int $tax_amount_inclusive The amount of tax already included in the line item prices.
 * @property ((object{amount: int, inclusive: bool, tax_rate_details: (object{country: null|string, flat_amount: null|(object{amount: int, currency: string}&\Stripe\StripeObject), percentage_decimal: string, rate_type: null|string, state: null|string, tax_type: null|string}&\Stripe\StripeObject), taxability_reason: string, taxable_amount: int}&\Stripe\StripeObject))[] $tax_breakdown Breakdown of individual tax amounts that add up to the total.
 * @property int $tax_date Timestamp of date at which the tax rules and rates in effect applies for the calculation.
 */
class Calculation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'tax.calculation';

    /**
     * Calculates tax based on the input and returns a Tax <code>Calculation</code>
     * object.
     *
     * @param null|array{currency: string, customer?: string, customer_details?: array{address?: array{city?: null|string, country: string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}, address_source?: string, ip_address?: string, tax_ids?: array{type: string, value: string}[], taxability_override?: string}, expand?: string[], line_items: array{amount: int, product?: string, quantity?: int, reference?: string, tax_behavior?: string, tax_code?: string}[], ship_from_details?: array{address: array{city?: null|string, country: string, line1?: null|string, line2?: null|string, postal_code?: null|string, state?: null|string}}, shipping_cost?: array{amount?: int, shipping_rate?: string, tax_behavior?: string, tax_code?: string}, tax_date?: int} $params
     * @param null|array|string $options
     *
     * @return Calculation the created resource
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
     * Retrieves a Tax <code>Calculation</code> object, if the calculation hasn’t
     * expired.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Calculation
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
     * @param string $id
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<CalculationLineItem> list of calculation line items
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function allLineItems($id, $params = null, $opts = null)
    {
        $url = static::resourceUrl($id) . '/line_items';
        list($response, $opts) = static::_staticRequest('get', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
