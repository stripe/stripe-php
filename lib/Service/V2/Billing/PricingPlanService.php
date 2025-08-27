<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property PricingPlans\ComponentService $components
 * @property PricingPlans\VersionService $versions
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PricingPlanService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'components' => PricingPlans\ComponentService::class,
        'versions' => PricingPlans\VersionService::class,
    ];

    /**
     * List all Pricing Plan objects.
     *
     * @param null|array{active?: bool, limit?: int, lookup_keys?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\PricingPlan>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/pricing_plans', $params, $opts);
    }

    /**
     * Create a Pricing Plan object.
     *
     * @param null|array{currency: string, description?: string, display_name: string, lookup_key?: string, metadata?: array<string, string>, tax_behavior: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlan
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/pricing_plans', $params, $opts);
    }

    /**
     * Retrieve a Pricing Plan object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlan
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/pricing_plans/%s', $id), $params, $opts);
    }

    /**
     * Update a Pricing Plan object.
     *
     * @param string $id
     * @param null|array{active?: bool, description?: string, display_name?: string, live_version?: string, lookup_key?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlan
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/pricing_plans/%s', $id), $params, $opts);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
