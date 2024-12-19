<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * Subscription items allow you to create customer subscriptions with more than
 * one plan, making it easy to represent complex billing relationships.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|(object{usage_gte: null|int}&\Stripe\StripeObject&\stdClass) $billing_thresholds Define thresholds at which an invoice will be sent, and the related subscription advanced to a new billing period
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property (string|\Stripe\Discount)[] $discounts The discounts applied to the subscription item. Subscription item discounts are applied before subscription discounts. Use <code>expand[]=discounts</code> to expand each discount.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\Plan $plan <p>You can now model subscriptions more flexibly using the <a href="https://stripe.com/docs/api#prices">Prices API</a>. It replaces the Plans API and is backwards compatible to simplify your migration.</p><p>Plans define the base price, currency, and billing cycle for recurring purchases of products. <a href="https://stripe.com/docs/api#products">Products</a> help you track inventory or provisioning, and plans help you track pricing. Different physical goods or levels of service should be represented by products, and pricing options should be represented by plans. This approach lets you change prices without having to change your provisioning scheme.</p><p>For example, you might have a single &quot;gold&quot; product that has plans for $10/month, $100/year, €9/month, and €90/year.</p><p>Related guides: <a href="https://stripe.com/docs/billing/subscriptions/set-up-subscription">Set up a subscription</a> and more about <a href="https://stripe.com/docs/products-prices/overview">products and prices</a>.</p>
 * @property \Stripe\Price $price <p>Prices define the unit cost, currency, and (optional) billing cycle for both recurring and one-time purchases of products. <a href="https://stripe.com/docs/api#products">Products</a> help you track inventory or provisioning, and prices help you track payment terms. Different physical goods or levels of service should be represented by products, and pricing options should be represented by prices. This approach lets you change prices without having to change your provisioning scheme.</p><p>For example, you might have a single &quot;gold&quot; product that has prices for $10/month, $100/year, and €9 once.</p><p>Related guides: <a href="https://stripe.com/docs/billing/subscriptions/set-up-subscription">Set up a subscription</a>, <a href="https://stripe.com/docs/billing/invoices/create">create an invoice</a>, and more about <a href="https://stripe.com/docs/products-prices/overview">products and prices</a>.</p>
 * @property null|int $quantity The <a href="https://stripe.com/docs/subscriptions/quantities">quantity</a> of the plan to which the customer should be subscribed.
 * @property string $subscription The <code>subscription</code> this <code>subscription_item</code> belongs to.
 * @property null|\Stripe\TaxRate[] $tax_rates The tax rates which apply to this <code>subscription_item</code>. When set, the <code>default_tax_rates</code> on the subscription do not apply to this <code>subscription_item</code>.
 * @property null|(object{converts_to?: null|string[], type: string}&\Stripe\StripeObject&\stdClass) $trial Options that configure the trial on the subscription item.
 */
class SubscriptionItem extends ApiResource
{
    const OBJECT_NAME = 'subscription_item';

    use ApiOperations\NestedResource;
    use ApiOperations\Update;

    /**
     * Adds a new item to an existing subscription. No existing items will be changed
     * or replaced.
     *
     * @param null|array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], metadata?: \Stripe\StripeObject, payment_behavior?: string, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, proration_behavior?: string, proration_date?: int, quantity?: int, subscription: string, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}} $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem the created resource
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
     * Deletes an item from the subscription. Removing a subscription item from a
     * subscription will not cancel the subscription.
     *
     * @param null|array{clear_usage?: bool, proration_behavior?: string, proration_date?: int} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem the deleted resource
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
     * Returns a list of your subscription items for a given subscription.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, subscription: string} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SubscriptionItem> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves the subscription item with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the plan or quantity of an item on a current subscription.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], metadata?: null|\Stripe\StripeObject, off_session?: bool, payment_behavior?: string, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, proration_behavior?: string, proration_date?: int, quantity?: int, tax_rates?: null|string[]} $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem the updated resource
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    const PATH_USAGE_RECORDS = '/usage_records';

    /**
     * @param string $id the ID of the subscription item on which to create the usage record
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\UsageRecord
     */
    public static function createUsageRecord($id, $params = null, $opts = null)
    {
        return self::_createNestedResource($id, static::PATH_USAGE_RECORDS, $params, $opts);
    }
    const PATH_USAGE_RECORD_SUMMARIES = '/usage_record_summaries';

    /**
     * @param string $id the ID of the subscription item on which to retrieve the usage record summaries
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\UsageRecordSummary> the list of usage record summaries
     */
    public static function allUsageRecordSummaries($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_USAGE_RECORD_SUMMARIES, $params, $opts);
    }
}
