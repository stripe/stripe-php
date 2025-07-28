<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MeterUsageService extends \Stripe\Service\AbstractService
{
    /**
     * Returns aggregated meter usage data for a customer within a specified time
     * interval. The data can be grouped by various dimensions and can include multiple
     * meters if specified.
     *
     * @param null|array{customer: string, end_time: int, expand?: string[], meters?: array{dimension_filters?: array<string, string>, dimension_group_by_keys?: string[], meter_id: string, tenant_filters?: array<string, string>}[], start_time: int, timezone?: string, value_grouping_window?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\Billing\MeterUsage
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/billing/analytics/meter_usage', $params, $opts);
    }
}
