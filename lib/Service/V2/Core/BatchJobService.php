<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class BatchJobService extends \Stripe\Service\AbstractService
{
    /**
     * Cancels an existing batch job.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\BatchJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/batch_jobs/%s/cancel', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'status_details' => [
                        'kind' => 'object',
                        'fields' => [
                            'canceled' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'complete' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'in_progress' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'timeout' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'validating' => [
                                'kind' => 'object',
                                'fields' => [
                                    'validated_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'validation_failed' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Creates a new batch job.
     *
     * @param null|array{endpoint: array{http_method: string, path: string}, metadata?: array<string, string>, notification_suppression?: array{scope: string}, skip_validation: bool} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\BatchJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/batch_jobs', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'status_details' => [
                        'kind' => 'object',
                        'fields' => [
                            'canceled' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'complete' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'in_progress' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'timeout' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'validating' => [
                                'kind' => 'object',
                                'fields' => [
                                    'validated_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'validation_failed' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Retrieves an existing batch job.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\BatchJob
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/batch_jobs/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'status_details' => [
                        'kind' => 'object',
                        'fields' => [
                            'canceled' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'complete' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'in_progress' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'timeout' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'validating' => [
                                'kind' => 'object',
                                'fields' => [
                                    'validated_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                ],
                            ],
                            'validation_failed' => [
                                'kind' => 'object',
                                'fields' => [
                                    'failure_count' => [
                                        'kind' => 'int64_string',
                                    ],
                                    'output_file' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                    'success_count' => [
                                        'kind' => 'int64_string',
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
