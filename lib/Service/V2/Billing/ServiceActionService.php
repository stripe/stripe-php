<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ServiceActionService extends \Stripe\Service\AbstractService
{
    /**
     * Create a Service Action object.
     *
     * @param null|array{lookup_key?: string, service_interval: string, service_interval_count: int, type: string, credit_grant?: array{amount: array{type: string, custom_pricing_unit?: array{id: string, value: string}, monetary?: array{value?: int, currency?: string}}, applicability_config: array{scope: array{billable_items?: string[], price_type?: string}}, category?: string, expiry_config: array{type: string}, name: string, priority?: int}, credit_grant_per_tenant?: array{amount: array{type: string, custom_pricing_unit?: array{id: string, value: string}, monetary?: array{value?: int, currency?: string}}, applicability_config: array{scope: array{billable_items?: string[], price_type?: string}}, category?: string, expiry_config: array{type: string}, grant_condition: array{type: string, meter_event_first_per_period?: array{meter_segment_conditions: array{type: string, dimension?: array{payload_key: string, value: string}}[]}}, name: string, priority?: int}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\ServiceAction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/service_actions', $params, $opts);
    }

    /**
     * Retrieve a Service Action object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\ServiceAction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/service_actions/%s', $id), $params, $opts);
    }

    /**
     * Update a ServiceAction object.
     *
     * @param string $id
     * @param null|array{lookup_key?: string, credit_grant?: array{name?: string}, credit_grant_per_tenant?: array{name?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\ServiceAction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/service_actions/%s', $id), $params, $opts);
    }
}
