<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class QueryRunService extends \Stripe\Service\AbstractService
{
    /**
     * Submits a SQL query for execution against a dataset and returns a `QueryRun`
     * object to track progress and retrieve results.
     *
     * @param null|array{dataset: string, format: string, query: array{sql?: string}, result_options?: array{compress_file?: bool}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\QueryRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/data/query_runs', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'result' => [
                        'kind' => 'object',
                        'fields' => [
                            'col_count' => ['kind' => 'int64_string'],
                            'file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                            'row_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Retrieves the status and results of a previously created `QueryRun`.
     *
     * @param string $id
     * @param null|array{include?: string[], limit?: int, page?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\QueryRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/data/query_runs/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'result' => [
                        'kind' => 'object',
                        'fields' => [
                            'col_count' => ['kind' => 'int64_string'],
                            'file' => [
                                'kind' => 'object',
                                'fields' => [
                                    'size' => ['kind' => 'int64_string'],
                                ],
                            ],
                            'row_count' => ['kind' => 'int64_string'],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
