<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Shipping rates describe the price of shipping presented to your customers and
 * applied to a purchase. For more information, see <a href="https://docs.stripe.com/payments/during-payment/charge-shipping">Charge for shipping</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the shipping rate can be used for new purchases. Defaults to <code>true</code>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|(object{maximum: null|(object{unit: string, value: int}&StripeObject), minimum: null|(object{unit: string, value: int}&StripeObject)}&StripeObject) $delivery_estimate The estimated range for how long shipping will take, meant to be displayable to the customer. This will appear on CheckoutSessions.
 * @property null|string $display_name The name of the shipping rate, meant to be displayable to the customer. This will appear on CheckoutSessions.
 * @property null|(object{amount: int, currency: string, currency_options?: StripeObject}&StripeObject) $fixed_amount
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $tax_behavior Specifies whether the rate is considered inclusive of taxes or exclusive of taxes. One of <code>inclusive</code>, <code>exclusive</code>, or <code>unspecified</code>.
 * @property null|string|TaxCode $tax_code A <a href="https://docs.stripe.com/tax/tax-categories">tax code</a> ID. The Shipping tax code is <code>txcd_92010001</code>.
 * @property string $type The type of calculation to use on the shipping rate.
 */
class ShippingRate extends ApiResource
{
    const OBJECT_NAME = 'shipping_rate';

    use ApiOperations\Update;

    const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';
    const TAX_BEHAVIOR_UNSPECIFIED = 'unspecified';

    const TYPE_FIXED_AMOUNT = 'fixed_amount';

    /**
     * Creates a new shipping rate object.
     *
     * @param null|array{delivery_estimate?: array{maximum?: array{unit: string, value: int}, minimum?: array{unit: string, value: int}}, display_name: string, expand?: string[], fixed_amount?: array{amount: int, currency: string, currency_options?: array<string, array{amount: int, tax_behavior?: string}>}, metadata?: array<string, string>, tax_behavior?: string, tax_code?: string, type?: string} $params
     * @param null|array|string $options
     *
     * @return ShippingRate the created resource
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
     * Returns a list of your shipping rates.
     *
     * @param null|array{active?: bool, created?: array|int, currency?: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<ShippingRate> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Returns the shipping rate object with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return ShippingRate
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
     * Updates an existing shipping rate object.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active?: bool, expand?: string[], fixed_amount?: array{currency_options?: array<string, array{amount?: int, tax_behavior?: string}>}, metadata?: null|array<string, string>, tax_behavior?: string} $params
     * @param null|array|string $opts
     *
     * @return ShippingRate the updated resource
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
