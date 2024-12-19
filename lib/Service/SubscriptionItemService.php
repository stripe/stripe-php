<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SubscriptionItemService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your subscription items for a given subscription.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, subscription: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\SubscriptionItem>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/subscription_items', $params, $opts);
    }

    /**
     * For the specified subscription item, returns a list of summary objects. Each
     * object in the list provides usage information that’s been summarized from
     * multiple usage records and over a subscription billing period (e.g., 15 usage
     * records in the month of September).
     *
     * The list is sorted in reverse-chronological order (newest first). The first list
     * item represents the most current usage period that hasn’t ended yet. Since new
     * usage records can still be added, the returned summary information for the
     * subscription item’s ID should be seen as unstable until the subscription billing
     * period ends.
     *
     * @param string $parentId
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\UsageRecordSummary>
     */
    public function allUsageRecordSummaries($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/subscription_items/%s/usage_record_summaries', $parentId), $params, $opts);
    }

    /**
     * Adds a new item to an existing subscription. No existing items will be changed
     * or replaced.
     *
     * @param null|array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], metadata?: \Stripe\StripeObject, payment_behavior?: string, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, proration_behavior?: string, proration_date?: int, quantity?: int, subscription: string, tax_rates?: null|string[], trial?: array{converts_to?: string[], type: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/subscription_items', $params, $opts);
    }

    /**
     * Creates a usage record for a specified subscription item and date, and fills it
     * with a quantity.
     *
     * Usage records provide <code>quantity</code> information that Stripe uses to
     * track how much a customer is using your service. With usage information and the
     * pricing model set up by the <a
     * href="https://stripe.com/docs/billing/subscriptions/metered-billing">metered
     * billing</a> plan, Stripe helps you send accurate invoices to your customers.
     *
     * The default calculation for usage is to add up all the <code>quantity</code>
     * values of the usage records within a billing period. You can change this default
     * behavior with the billing plan’s <code>aggregate_usage</code> <a
     * href="/docs/api/plans/create#create_plan-aggregate_usage">parameter</a>. When
     * there is more than one usage record with the same timestamp, Stripe adds the
     * <code>quantity</code> values together. In most cases, this is the desired
     * resolution, however, you can change this behavior with the <code>action</code>
     * parameter.
     *
     * The default pricing model for metered billing is <a
     * href="/docs/api/plans/object#plan_object-billing_scheme">per-unit pricing</a>.
     * For finer granularity, you can configure metered billing to have a <a
     * href="https://stripe.com/docs/billing/subscriptions/tiers">tiered pricing</a>
     * model.
     *
     * @param string $parentId
     * @param null|array{action?: string, expand?: string[], quantity: int, timestamp?: string|int|array} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\UsageRecord
     */
    public function createUsageRecord($parentId, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_items/%s/usage_records', $parentId), $params, $opts);
    }

    /**
     * Deletes an item from the subscription. Removing a subscription item from a
     * subscription will not cancel the subscription.
     *
     * @param string $id
     * @param null|array{clear_usage?: bool, proration_behavior?: string, proration_date?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/subscription_items/%s', $id), $params, $opts);
    }

    /**
     * Retrieves the subscription item with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/subscription_items/%s', $id), $params, $opts);
    }

    /**
     * Updates the plan or quantity of an item on a current subscription.
     *
     * @param string $id
     * @param null|array{billing_thresholds?: null|array{usage_gte: int}, discounts?: null|array{coupon?: string, discount?: string, discount_end?: array{duration?: array{interval: string, interval_count: int}, timestamp?: int, type: string}, promotion_code?: string}[], expand?: string[], metadata?: null|\Stripe\StripeObject, off_session?: bool, payment_behavior?: string, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, proration_behavior?: string, proration_date?: int, quantity?: int, tax_rates?: null|string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\SubscriptionItem
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_items/%s', $id), $params, $opts);
    }
}
