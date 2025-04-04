<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Prices define the unit cost, currency, and (optional) billing cycle for both recurring and one-time purchases of products.
 * <a href="https://stripe.com/docs/api#products">Products</a> help you track inventory or provisioning, and prices help you track payment terms. Different physical goods or levels of service should be represented by products, and pricing options should be represented by prices. This approach lets you change prices without having to change your provisioning scheme.
 *
 * For example, you might have a single &quot;gold&quot; product that has prices for $10/month, $100/year, and €9 once.
 *
 * Related guides: <a href="https://stripe.com/docs/billing/subscriptions/set-up-subscription">Set up a subscription</a>, <a href="https://stripe.com/docs/billing/invoices/create">create an invoice</a>, and more about <a href="https://stripe.com/docs/products-prices/overview">products and prices</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the price can be used for new purchases.
 * @property string $billing_scheme Describes how to compute the price per period. Either <code>per_unit</code> or <code>tiered</code>. <code>per_unit</code> indicates that the fixed amount (specified in <code>unit_amount</code> or <code>unit_amount_decimal</code>) will be charged per unit in <code>quantity</code> (for prices with <code>usage_type=licensed</code>), or per unit of total usage (for prices with <code>usage_type=metered</code>). <code>tiered</code> indicates that the unit pricing will be computed using a tiering strategy as defined using the <code>tiers</code> and <code>tiers_mode</code> attributes.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|StripeObject $currency_options Prices defined in each available currency option. Each key must be a three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a> and a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|(object{maximum: null|int, minimum: null|int, preset: null|int}&StripeObject) $custom_unit_amount When set, provides configuration for the amount to be adjusted by the customer during Checkout Sessions and Payment Links.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key A lookup key used to retrieve prices dynamically from a static string. This may be up to 200 characters.
 * @property StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $nickname A brief description of the price, hidden from customers.
 * @property Product|string $product The ID of the product this price is associated with.
 * @property null|(object{interval: string, interval_count: int, meter: null|string, trial_period_days: null|int, usage_type: string}&StripeObject) $recurring The recurring components of a price such as <code>interval</code> and <code>usage_type</code>.
 * @property null|string $tax_behavior Only required if a <a href="https://stripe.com/docs/tax/products-prices-tax-categories-tax-behavior#setting-a-default-tax-behavior-(recommended)">default tax behavior</a> was not provided in the Stripe Tax settings. Specifies whether the price is considered inclusive of taxes or exclusive of taxes. One of <code>inclusive</code>, <code>exclusive</code>, or <code>unspecified</code>. Once specified as either <code>inclusive</code> or <code>exclusive</code>, it cannot be changed.
 * @property null|((object{flat_amount: null|int, flat_amount_decimal: null|string, unit_amount: null|int, unit_amount_decimal: null|string, up_to: null|int}&StripeObject))[] $tiers Each element represents a pricing tier. This parameter requires <code>billing_scheme</code> to be set to <code>tiered</code>. See also the documentation for <code>billing_scheme</code>.
 * @property null|string $tiers_mode Defines if the tiering price should be <code>graduated</code> or <code>volume</code> based. In <code>volume</code>-based tiering, the maximum quantity within a period determines the per unit price. In <code>graduated</code> tiering, pricing can change as the quantity grows.
 * @property null|(object{divide_by: int, round: string}&StripeObject) $transform_quantity Apply a transformation to the reported usage or set quantity before computing the amount billed. Cannot be combined with <code>tiers</code>.
 * @property string $type One of <code>one_time</code> or <code>recurring</code> depending on whether the price is for a one-time purchase or a recurring (subscription) purchase.
 * @property null|int $unit_amount The unit amount in cents (or local equivalent) to be charged, represented as a whole integer if possible. Only set if <code>billing_scheme=per_unit</code>.
 * @property null|string $unit_amount_decimal The unit amount in cents (or local equivalent) to be charged, represented as a decimal string with at most 12 decimal places. Only set if <code>billing_scheme=per_unit</code>.
 */
class Price extends ApiResource
{
    const OBJECT_NAME = 'price';

    use ApiOperations\Update;

    const BILLING_SCHEME_PER_UNIT = 'per_unit';
    const BILLING_SCHEME_TIERED = 'tiered';

    const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';
    const TAX_BEHAVIOR_UNSPECIFIED = 'unspecified';

    const TIERS_MODE_GRADUATED = 'graduated';
    const TIERS_MODE_VOLUME = 'volume';

    const TYPE_ONE_TIME = 'one_time';
    const TYPE_RECURRING = 'recurring';

    /**
     * Creates a new <a href="https://docs.stripe.com/api/prices">Price</a> for an
     * existing <a href="https://docs.stripe.com/api/products">Product</a>. The Price
     * can be recurring or one-time.
     *
     * @param null|array{active?: bool, billing_scheme?: string, currency: string, currency_options?: StripeObject, custom_unit_amount?: array{enabled: bool, maximum?: int, minimum?: int, preset?: int}, expand?: string[], lookup_key?: string, metadata?: StripeObject, nickname?: string, product?: string, product_data?: array{active?: bool, id?: string, metadata?: StripeObject, name: string, statement_descriptor?: string, tax_code?: string, unit_label?: string}, recurring?: array{interval: string, interval_count?: int, meter?: string, trial_period_days?: int, usage_type?: string}, tax_behavior?: string, tiers?: (array{flat_amount?: int, flat_amount_decimal?: string, unit_amount?: int, unit_amount_decimal?: string, up_to: array|int|string})[], tiers_mode?: string, transfer_lookup_key?: bool, transform_quantity?: array{divide_by: int, round: string}, unit_amount?: int, unit_amount_decimal?: string} $params
     * @param null|array|string $options
     *
     * @return Price the created resource
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
     * Returns a list of your active prices, excluding <a
     * href="/docs/products-prices/pricing-models#inline-pricing">inline prices</a>.
     * For the list of inactive prices, set <code>active</code> to false.
     *
     * @param null|array{active?: bool, created?: array|int, currency?: string, ending_before?: string, expand?: string[], limit?: int, lookup_keys?: string[], product?: string, recurring?: array{interval?: string, meter?: string, usage_type?: string}, starting_after?: string, type?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Price> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the price with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Price
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
     * Updates the specified price by setting the values of the parameters passed. Any
     * parameters not provided are left unchanged.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active?: bool, currency_options?: null|StripeObject, expand?: string[], lookup_key?: string, metadata?: null|StripeObject, nickname?: string, tax_behavior?: string, transfer_lookup_key?: bool} $params
     * @param null|array|string $opts
     *
     * @return Price the updated resource
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

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return SearchResult<Price> the price search results
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function search($params = null, $opts = null)
    {
        $url = '/v1/prices/search';

        return static::_requestPage($url, SearchResult::class, $params, $opts);
    }
}
