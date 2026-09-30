<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ReportRunService extends \Stripe\Service\AbstractService
{
    /**
     * Initiates the generation of a `ReportRun` based on the specified `Report` and
     * caller-provided parameters. Returns a `ReportRun` object which can be used to
     * track the progress and retrieve the results of the report.
     *
     * @param null|array{format: string, parameters: array, report: array{id?: string, name?: string}, result_options?: array{compress_file?: bool}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\ReportRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/data/report_runs', $params, $opts, [
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
     * Fetches the current state and details of a previously created `ReportRun`. If
     * the `ReportRun` has succeeded, the endpoint provides details for how to retrieve
     * the results.
     *
     * @param string $id
     * @param null|array{include?: string[], limit?: int, page?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Data\ReportRun
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/data/report_runs/%s', $id), $params, $opts, [
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
