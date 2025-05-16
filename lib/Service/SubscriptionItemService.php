<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class SubscriptionItemService extends AbstractService
{
    /**
     * Returns a list of your subscription items for a given subscription.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, subscription: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\SubscriptionItem>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/subscription_items', $params, $opts);
    }

    /**
     * Adds a new item to an existing subscription. No existing items will be changed
     * or replaced.
     *
     * @param null|array{discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], metadata?: array<string, string>, payment_behavior?: string, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, proration_behavior?: string, proration_date?: int, quantity?: int, subscription: string, tax_rates?: null|string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SubscriptionItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/subscription_items', $params, $opts);
    }

    /**
     * Deletes an item from the subscription. Removing a subscription item from a
     * subscription will not cancel the subscription.
     *
     * @param string $id
     * @param null|array{clear_usage?: bool, proration_behavior?: string, proration_date?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SubscriptionItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\SubscriptionItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/subscription_items/%s', $id), $params, $opts);
    }

    /**
     * Updates the plan or quantity of an item on a current subscription.
     *
     * @param string $id
     * @param null|array{discounts?: null|array{coupon?: string, discount?: string, promotion_code?: string}[], expand?: string[], metadata?: null|array<string, string>, off_session?: bool, payment_behavior?: string, plan?: string, price?: string, price_data?: array{currency: string, product: string, recurring: array{interval: string, interval_count?: int}, tax_behavior?: string, unit_amount?: int, unit_amount_decimal?: string}, proration_behavior?: string, proration_date?: int, quantity?: int, tax_rates?: null|string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\SubscriptionItem
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/subscription_items/%s', $id), $params, $opts);
    }
}
