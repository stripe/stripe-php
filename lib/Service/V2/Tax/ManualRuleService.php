<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ManualRuleService extends \Stripe\Service\AbstractService
{
    /**
     * List all ManualRule objects.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Tax\ManualRule>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/tax/manual_rules', $params, $opts);
    }

    /**
     * Creates a ManualRule object.
     *
     * @param null|array{location?: array{country: string, state?: string}, products?: array{type: string, licensed_item?: string, metered_item?: string, tax_code?: string}[], scheduled_tax_rates: array{rates: array{country?: string, description?: string, display_name: string, jurisdiction?: string, percentage: string, state?: string}[], starts_at?: string}[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\ManualRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/tax/manual_rules', $params, $opts);
    }

    /**
     * Deactivates a ManualRule object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\ManualRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/tax/manual_rules/%s/deactivate', $id), $params, $opts);
    }

    /**
     * Retrieves a ManualRule object by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\ManualRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/tax/manual_rules/%s', $id), $params, $opts);
    }

    /**
     * Updates the Tax configuration for a ManualRule object.
     *
     * @param string $id
     * @param null|array{location?: array{country: string, state?: string}, products?: array{type: string, licensed_item?: string, metered_item?: string, tax_code?: string}[], scheduled_tax_rates: array{rates: array{country?: string, description?: string, display_name: string, jurisdiction?: string, percentage: string, state?: string}[], starts_at?: string}[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Tax\ManualRule
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/tax/manual_rules/%s', $id), $params, $opts);
    }
}
