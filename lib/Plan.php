<?php

namespace Stripe;

/**
 * Class Plan
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the plan is currently available for new subscriptions.
 * @property string|null $aggregate_usage Specifies a usage aggregation strategy for plans of <code>usage_type=metered</code>. Allowed values are <code>sum</code> for summing up all usage during a period, <code>last_during_period</code> for picking the last usage record reported within a period, <code>last_ever</code> for picking the last usage record ever (across period bounds) or <code>max</code> which picks the usage record with the maximum reported usage during a period. Defaults to <code>sum</code>.
 * @property int|null $amount The amount in %s to be charged on the interval specified.
 * @property string|null $amount_decimal Same as <code>amount</code>, but contains a decimal value with at most 12 decimal places.
 * @property string|null $billing_scheme Describes how to compute the price per period. Either <code>per_unit</code> or <code>tiered</code>. <code>per_unit</code> indicates that the fixed amount (specified in <code>amount</code>) will be charged per unit in <code>quantity</code> (for plans with <code>usage_type=licensed</code>), or per unit of total usage (for plans with <code>usage_type=metered</code>). <code>tiered</code> indicates that the unit pricing will be computed using a tiering strategy as defined using the <code>tiers</code> and <code>tiers_mode</code> attributes.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $interval One of <code>day</code>, <code>week</code>, <code>month</code> or <code>year</code>. The frequency with which a subscription should be billed.
 * @property int $interval_count The number of intervals (specified in the <code>interval</code> property) between subscription billings. For example, <code>interval=month</code> and <code>interval_count=3</code> bills every 3 months.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string|null $nickname A brief description of the plan, hidden from customers.
 * @property string|\Stripe\Product|null $product The product whose pricing this plan determines.
 * @property \Stripe\StripeObject[]|null $tiers Each element represents a pricing tier. This parameter requires <code>billing_scheme</code> to be set to <code>tiered</code>. See also the documentation for <code>billing_scheme</code>.
 * @property string|null $tiers_mode Defines if the tiering price should be <code>graduated</code> or <code>volume</code> based. In <code>volume</code>-based tiering, the maximum quantity within a period determines the per unit price, in <code>graduated</code> tiering pricing can successively change as the quantity grows.
 * @property \Stripe\StripeObject|null $transform_usage Apply a transformation to the reported usage or set quantity before computing the billed price. Cannot be combined with <code>tiers</code>.
 * @property int|null $trial_period_days Default number of trial days when subscribing a customer to this plan using <a href="https://stripe.com/docs/api#create_subscription-trial_from_plan"><code>trial_from_plan=true</code></a>.
 * @property string $usage_type Configures how the quantity per period should be determined, can be either <code>metered</code> or <code>licensed</code>. <code>licensed</code> will automatically bill the <code>quantity</code> set when adding it to a subscription, <code>metered</code> will aggregate the total usage based on usage records. Defaults to <code>licensed</code>.
 *
 * @package Stripe
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
