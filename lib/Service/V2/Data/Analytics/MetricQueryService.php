<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data\Analytics;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class MetricQueryService extends \Stripe\Service\AbstractService
{
    /**
     * Run a synchronous metric query against one or more metrics within the same
     * metric namespace.
     *
     * @param null|array{currency?: string, ends_at: string, filters?: array, granularity: string, group_by?: string[], limit?: int, metrics: array{id?: string, name?: string}[], page?: string, starts_at: string, timezone?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\Analytics\MetricQueryResult
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/data/analytics/metric_query', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'results' => [
                                    'kind' => 'array',
                                    'element' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
