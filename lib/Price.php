<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Prices define the unit cost, currency, and (optional) billing cycle for both
 * recurring and one-time purchases of products. <a
 * href="https://stripe.com/docs/api#products">Products</a> help you track
 * inventory or provisioning, and prices help you track payment terms. Different
 * physical goods or levels of service should be represented by products, and
 * pricing options should be represented by prices. This approach lets you change
 * prices without having to change your provisioning scheme.
 *
 * For example, you might have a single &quot;gold&quot; product that has prices
 * for $10/month, $100/year, and €9 once.
 *
 * Related guides: <a
 * href="https://stripe.com/docs/billing/subscriptions/set-up-subscription">Set up
 * a subscription</a>, <a
 * href="https://stripe.com/docs/billing/invoices/create">create an invoice</a>,
 * and more about <a
 * href="https://stripe.com/docs/products-prices/overview">products and prices</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the price can be used for new purchases.
 * @property string $billing_scheme Describes how to compute the price per period. Either `per_unit` or `tiered`. `per_unit` indicates that the fixed amount (specified in `unit_amount` or `unit_amount_decimal`) will be charged per unit in `quantity` (for prices with `usage_type=licensed`), or per unit of total usage (for prices with `usage_type=metered`). `tiered` indicates that the unit pricing will be computed using a tiering strategy as defined using the `tiers` and `tiers_mode` attributes.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html), in lowercase. Must be a [supported currency](https://stripe.com/docs/currencies).
 * @property null|\Stripe\StripeObject $currency_options Prices defined in each available currency option. Each key must be a three-letter [ISO currency code](https://www.iso.org/iso-4217-currency-codes.html) and a [supported currency](https://stripe.com/docs/currencies).
 * @property null|\Stripe\StripeObject $custom_unit_amount When set, provides configuration for the amount to be adjusted by the customer during Checkout Sessions and Payment Links.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|string $lookup_key A lookup key used to retrieve prices dynamically from a static string. This may be up to 200 characters.
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $nickname A brief description of the price, hidden from customers.
 * @property string|\Stripe\Product $product The ID of the product this price is associated with.
 * @property null|\Stripe\StripeObject $recurring The recurring components of a price such as `interval` and `usage_type`.
 * @property null|string $tax_behavior Only required if a [default tax behavior](https://stripe.com/docs/tax/products-prices-tax-categories-tax-behavior#setting-a-default-tax-behavior-(recommended)) was not provided in the Stripe Tax settings. Specifies whether the price is considered inclusive of taxes or exclusive of taxes. One of `inclusive`, `exclusive`, or `unspecified`. Once specified as either `inclusive` or `exclusive`, it cannot be changed.
 * @property null|\Stripe\StripeObject[] $tiers Each element represents a pricing tier. This parameter requires `billing_scheme` to be set to `tiered`. See also the documentation for `billing_scheme`.
 * @property null|string $tiers_mode Defines if the tiering price should be `graduated` or `volume` based. In `volume`-based tiering, the maximum quantity within a period determines the per unit price. In `graduated` tiering, pricing can change as the quantity grows.
 * @property null|\Stripe\StripeObject $transform_quantity Apply a transformation to the reported usage or set quantity before computing the amount billed. Cannot be combined with `tiers`.
 * @property string $type One of `one_time` or `recurring` depending on whether the price is for a one-time purchase or a recurring (subscription) purchase.
 * @property null|int $unit_amount The unit amount in %s to be charged, represented as a whole integer if possible. Only set if `billing_scheme=per_unit`.
 * @property null|string $unit_amount_decimal The unit amount in %s to be charged, represented as a decimal string with at most 12 decimal places. Only set if `billing_scheme=per_unit`.
 */
class Price extends ApiResource
{
    const OBJECT_NAME = 'price';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Search;
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
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SearchResult<Price> the price search results
     */
    public static function search($params = null, $opts = null)
    {
        $url = '/v1/prices/search';

        return self::_searchResource($url, $params, $opts);
    }
}
