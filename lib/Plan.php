<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * You can now model subscriptions more flexibly using the <a href="https://stripe.com/docs/api#prices">Prices API</a>. It replaces the Plans API and is backwards compatible to simplify your migration.
 *
 * Plans define the base price, currency, and billing cycle for recurring purchases of products.
 * <a href="https://stripe.com/docs/api#products">Products</a> help you track inventory or provisioning, and plans help you track pricing. Different physical goods or levels of service should be represented by products, and pricing options should be represented by plans. This approach lets you change prices without having to change your provisioning scheme.
 *
 * For example, you might have a single &quot;gold&quot; product that has plans for $10/month, $100/year, €9/month, and €90/year.
 *
 * Related guides: <a href="https://stripe.com/docs/billing/subscriptions/set-up-subscription">Set up a subscription</a> and more about <a href="https://stripe.com/docs/products-prices/overview">products and prices</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Whether the plan can be used for new purchases.
 * @property null|int $amount The unit amount in cents (or local equivalent) to be charged, represented as a whole integer if possible. Only set if <code>billing_scheme=per_unit</code>.
 * @property null|string $amount_decimal The unit amount in cents (or local equivalent) to be charged, represented as a decimal string with at most 12 decimal places. Only set if <code>billing_scheme=per_unit</code>.
 * @property string $billing_scheme Describes how to compute the price per period. Either <code>per_unit</code> or <code>tiered</code>. <code>per_unit</code> indicates that the fixed amount (specified in <code>amount</code>) will be charged per unit in <code>quantity</code> (for plans with <code>usage_type=licensed</code>), or per unit of total usage (for plans with <code>usage_type=metered</code>). <code>tiered</code> indicates that the unit pricing will be computed using a tiering strategy as defined using the <code>tiers</code> and <code>tiers_mode</code> attributes.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $interval The frequency at which a subscription is billed. One of <code>day</code>, <code>week</code>, <code>month</code> or <code>year</code>.
 * @property int $interval_count The number of intervals (specified in the <code>interval</code> attribute) between subscription billings. For example, <code>interval=month</code> and <code>interval_count=3</code> bills every 3 months.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $meter The meter tracking the usage of a metered price
 * @property null|string $nickname A brief description of the plan, hidden from customers.
 * @property null|Product|string $product The product whose pricing this plan determines.
 * @property null|((object{flat_amount: null|int, flat_amount_decimal: null|string, unit_amount: null|int, unit_amount_decimal: null|string, up_to: null|int}&StripeObject))[] $tiers Each element represents a pricing tier. This parameter requires <code>billing_scheme</code> to be set to <code>tiered</code>. See also the documentation for <code>billing_scheme</code>.
 * @property null|string $tiers_mode Defines if the tiering price should be <code>graduated</code> or <code>volume</code> based. In <code>volume</code>-based tiering, the maximum quantity within a period determines the per unit price. In <code>graduated</code> tiering, pricing can change as the quantity grows.
 * @property null|(object{divide_by: int, round: string}&StripeObject) $transform_usage Apply a transformation to the reported usage or set quantity before computing the amount billed. Cannot be combined with <code>tiers</code>.
 * @property null|int $trial_period_days Default number of trial days when subscribing a customer to this plan using <a href="https://stripe.com/docs/api#create_subscription-trial_from_plan"><code>trial_from_plan=true</code></a>.
 * @property string $usage_type Configures how the quantity per period should be determined. Can be either <code>metered</code> or <code>licensed</code>. <code>licensed</code> automatically bills the <code>quantity</code> set when adding it to a subscription. <code>metered</code> aggregates the total usage based on usage records. Defaults to <code>licensed</code>.
 */
class Plan extends ApiResource
{
    const OBJECT_NAME = 'plan';

    use ApiOperations\Update;

    const BILLING_SCHEME_PER_UNIT = 'per_unit';
    const BILLING_SCHEME_TIERED = 'tiered';

    const INTERVAL_DAY = 'day';
    const INTERVAL_MONTH = 'month';
    const INTERVAL_WEEK = 'week';
    const INTERVAL_YEAR = 'year';

    const TIERS_MODE_GRADUATED = 'graduated';
    const TIERS_MODE_VOLUME = 'volume';

    const USAGE_TYPE_LICENSED = 'licensed';
    const USAGE_TYPE_METERED = 'metered';

    /**
     * You can now model subscriptions more flexibly using the <a href="#prices">Prices
     * API</a>. It replaces the Plans API and is backwards compatible to simplify your
     * migration.
     *
     * @param null|array{active?: bool, amount?: int, amount_decimal?: string, billing_scheme?: string, currency: string, expand?: string[], id?: string, interval: string, interval_count?: int, metadata?: null|StripeObject, meter?: string, nickname?: string, product?: array|string, tiers?: (array{flat_amount?: int, flat_amount_decimal?: string, unit_amount?: int, unit_amount_decimal?: string, up_to: array|int|string})[], tiers_mode?: string, transform_usage?: array{divide_by: int, round: string}, trial_period_days?: int, usage_type?: string} $params
     * @param null|array|string $options
     *
     * @return Plan the created resource
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
     * Deleting plans means new subscribers can’t be added. Existing subscribers aren’t
     * affected.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Plan the deleted resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of your plans.
     *
     * @param null|array{active?: bool, created?: array|int, ending_before?: string, expand?: string[], limit?: int, product?: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<Plan> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the plan with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Plan
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
     * Updates the specified plan by setting the values of the parameters passed. Any
     * parameters not provided are left unchanged. By design, you cannot change a
     * plan’s ID, amount, currency, or billing cycle.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{active?: bool, expand?: string[], metadata?: null|StripeObject, nickname?: string, product?: string, trial_period_days?: int} $params
     * @param null|array|string $opts
     *
     * @return Plan the updated resource
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
