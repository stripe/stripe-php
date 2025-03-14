<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MeterService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieve a list of billing meters.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Billing\Meter>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/billing/meters', $params, $opts);
    }

    /**
     * Retrieve a list of billing meter event summaries.
     *
     * @param string $parentId
     * @param null|array{customer: string, end_time: int, ending_before?: string, expand?: string[], limit?: int, start_time: int, starting_after?: string, value_grouping_window?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Collection<\Stripe\Billing\MeterEventSummary>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allEventSummaries($parentId, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v1/billing/meters/%s/event_summaries', $parentId), $params, $opts);
    }

    /**
     * Creates a billing meter.
     *
     * @param null|array{customer_mapping?: array{event_payload_key: string, type: string}, default_aggregation: array{formula: string}, display_name: string, event_name: string, event_time_window?: string, expand?: string[], value_settings?: array{event_payload_key: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Meter
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v1/billing/meters', $params, $opts);
    }

    /**
     * When a meter is deactivated, no more meter events will be accepted for this
     * meter. You can’t attach a deactivated meter to a price.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Meter
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function deactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/meters/%s/deactivate', $id), $params, $opts);
    }

    /**
     * When a meter is reactivated, events for this meter can be accepted and you can
     * attach the meter to a price.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Meter
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reactivate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/meters/%s/reactivate', $id), $params, $opts);
    }

    /**
     * Retrieves a billing meter given an ID.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Meter
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/billing/meters/%s', $id), $params, $opts);
    }

    /**
     * Updates a billing meter.
     *
     * @param string $id
     * @param null|array{display_name?: string, expand?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\Meter
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/billing/meters/%s', $id), $params, $opts);
    }
}
