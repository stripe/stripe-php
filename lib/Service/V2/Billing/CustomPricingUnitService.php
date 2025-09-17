<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CustomPricingUnitService extends \Stripe\Service\AbstractService
{
    /**
     * List all Custom Pricing Unit objects.
     *
     * @param null|array{active?: bool, limit?: int, lookup_keys?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\CustomPricingUnit>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/custom_pricing_units', $params, $opts);
    }

    /**
     * Create a Custom Pricing Unit object.
     *
     * @param null|array{display_name: string, lookup_key?: string, metadata?: array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CustomPricingUnit
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/custom_pricing_units', $params, $opts);
    }

    /**
     * Retrieve a Custom Pricing Unit object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CustomPricingUnit
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/custom_pricing_units/%s', $id), $params, $opts);
    }

    /**
     * Update a Custom Pricing Unit object.
     *
     * @param string $id
     * @param null|array{active?: bool, display_name?: string, lookup_key?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\CustomPricingUnit
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/custom_pricing_units/%s', $id), $params, $opts);
    }
}
