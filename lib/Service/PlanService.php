<?php

// File generated from our OpenAPI spec

namespace Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PlanService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of your plans.
     *
     * @param null|array{active?: bool, created?: int|array, ending_before?: string, expand?: string[], limit?: int, product?: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Plan>
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/plans', $params, $opts);
    }

    /**
     * You can now model subscriptions more flexibly using the <a href="#prices">Prices
     * API</a>. It replaces the Plans API and is backwards compatible to simplify your
     * migration.
     *
     * @param null|array{active?: bool, aggregate_usage?: string, amount?: int, amount_decimal?: string, billing_scheme?: string, currency: string, expand?: string[], id?: string, interval: string, interval_count?: int, metadata?: null|\Stripe\StripeObject, meter?: string, nickname?: string, product?: string|array, tiers?: (array{flat_amount?: int, flat_amount_decimal?: string, unit_amount?: int, unit_amount_decimal?: string, up_to: string|int|array})[], tiers_mode?: string, transform_usage?: array{divide_by: int, round: string}, trial_period_days?: int, usage_type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Plan
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/plans', $params, $opts);
    }

    /**
     * Deleting plans means new subscribers can’t be added. Existing subscribers aren’t
     * affected.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Plan
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v1/plans/%s', $id), $params, $opts);
    }

    /**
     * Retrieves the plan with the given ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Plan
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/plans/%s', $id), $params, $opts);
    }

    /**
     * Updates the specified plan by setting the values of the parameters passed. Any
     * parameters not provided are left unchanged. By design, you cannot change a
     * plan’s ID, amount, currency, or billing cycle.
     *
     * @param string $id
     * @param null|array{active?: bool, expand?: string[], metadata?: null|\Stripe\StripeObject, nickname?: string, product?: string, trial_period_days?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Plan
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/plans/%s', $id), $params, $opts);
    }
}
