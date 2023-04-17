<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * You can now model subscriptions more flexibly using the <a
 * href="https://stripe.com/docs/api#prices">Prices API</a>. It replaces the Plans
 * API and is backwards compatible to simplify your migration.
 *
 * Plans define the base price, currency, and billing cycle for recurring purchases
 * of products. <a href="https://stripe.com/docs/api#products">Products</a> help
 * you track inventory or provisioning, and plans help you track pricing. Different
 * physical goods or levels of service should be represented by products, and
 * pricing options should be represented by plans. This approach lets you change
 * prices without having to change your provisioning scheme.
 *
 * For example, you might have a single &quot;gold&quot; product that has plans for
 * $10/month, $100/year, €9/month, and €90/year.
 *
 * Related guides: <a
 * href="https://stripe.com/docs/billing/subscriptions/set-up-subscription">Set up
 * a subscription</a> and more about <a
 * href="https://stripe.com/docs/products-prices/overview">products and prices</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the plan can be used for new purchases.
 * @property null|string $aggregate_usage Specifies a usage aggregation strategy for plans of `usage_type=metered`. Allowed values are `sum` for summing up all usage during a period, `last_during_period` for using the last usage record reported within a period, `last_ever` for using the last usage record ever (across period bounds) or `max` which uses the usage record with the maximum reported usage during a period. Defaults to `sum`.
 * @property null|int $amount The unit amount in %s to be charged, represented as a whole integer if possible. Only set if `billing_scheme=per_unit`.
 * @property null|string $amount_decimal The unit amount in %s to be charged, represented as a decimal string with at most 12 decimal places. Only set if `billing_scheme=per_unit`.
 * @property string $billing_scheme Describes how to compute the price per period. Either `per_unit` or `tiered`. `per_unit` indicates that the fixed amount (specified in `amount`) will be charged per unit in `quantity` (for plans with `usage_type=licensed`), or per unit of total usage (for plans with `usage_type=metered`). `tiered` indicates that the unit pricing will be computed using a tiering strategy as defined using the `tiers` and `tiers_mode` attributes.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $interval The frequency at which a subscription is billed. One of `day`, `week`, `month` or `year`.
 * @property int $interval_count The number of intervals (specified in the `interval` attribute) between subscription billings. For example, `interval=month` and `interval_count=3` bills every 3 months.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $nickname A brief description of the plan, hidden from customers.
 * @property null|string|\Stripe\Product $product The product whose pricing this plan determines.
 * @property null|\Stripe\StripeObject[] $tiers Each element represents a pricing tier. This parameter requires `billing_scheme` to be set to `tiered`. See also the documentation for `billing_scheme`.
 * @property null|string $tiers_mode Defines if the tiering price should be `graduated` or `volume` based. In `volume`-based tiering, the maximum quantity within a period determines the per unit price. In `graduated` tiering, pricing can change as the quantity grows.
 * @property null|\Stripe\StripeObject $transform_usage Apply a transformation to the reported usage or set quantity before computing the amount billed. Cannot be combined with `tiers`.
 * @property null|int $trial_period_days Default number of trial days when subscribing a customer to this plan using <a href="https://stripe.com/docs/api#create_subscription-trial_from_plan">`trial_from_plan=true`</a>.
 * @property string $usage_type Configures how the quantity per period should be determined. Can be either `metered` or `licensed`. `licensed` automatically bills the `quantity` set when adding it to a subscription. `metered` aggregates the total usage based on usage records. Defaults to `licensed`.
 */
class Plan extends ApiResource
{
    const OBJECT_NAME = 'plan';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
