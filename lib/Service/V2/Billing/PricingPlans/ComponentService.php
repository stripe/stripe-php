<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\PricingPlans;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ComponentService extends \Stripe\Service\AbstractService
{
    /**
     * List all Pricing Plan Component objects for a Pricing Plan.
     *
     * @param string $id
     * @param null|array{limit?: int, lookup_keys?: string[], pricing_plan_version?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\PricingPlanComponent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/pricing_plans/%s/components', $id), $params, $opts);
    }

    /**
     * Create a Pricing Plan Component object.
     *
     * @param string $id
     * @param null|array{lookup_key?: string, metadata?: array<string, string>, type: string, license_fee?: array{id: string, version?: string}, rate_card?: array{id: string, version?: string}, service_action?: array{id: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanComponent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/pricing_plans/%s/components', $id), $params, $opts);
    }

    /**
     * Remove a Pricing Plan Component from the latest version of a Pricing Plan.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\DeletedObject
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v2/billing/pricing_plans/%s/components/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Retrieve a Pricing Plan Component object.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanComponent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/pricing_plans/%s/components/%s', $parentId, $id), $params, $opts);
    }

    /**
     * Update a Pricing Plan Component object.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{lookup_key?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanComponent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/pricing_plans/%s/components/%s', $parentId, $id), $params, $opts);
    }
}
