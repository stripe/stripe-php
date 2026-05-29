<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data\Reporting;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class QueryRunService extends \Stripe\Service\AbstractService
{
    /**
     * Creates a query run to execute ad-hoc SQL and returns a `QueryRun` object to
     * track progress and retrieve results.
     *
     * @param null|array{result_options?: array{compress_file?: bool}, sql: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\Reporting\QueryRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/data/reporting/query_runs', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'result' => [
                        'kind' => 'object',
                        'fields' => [
                            'file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Fetches the current state and details of a previously created `QueryRun`. If the
     * `QueryRun` has succeeded, the endpoint will provide details for how to retrieve
     * the results.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\Reporting\QueryRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/data/reporting/query_runs/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'result' => [
                        'kind' => 'object',
                        'fields' => [
                            'file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
