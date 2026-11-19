<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Iam;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ActivityLogService extends \Stripe\Service\AbstractService
{
    /**
     * List activity logs of an account.
     *
     * @param null|array{action_groups?: string[], actions?: string[], limit?: int, logs_from?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Iam\ActivityLog>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/iam/activity_logs', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'details' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'radar' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'new_rules' => [
                                                    'kind' => 'array',
                                                    'element' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'rollout_percentage' => [
                                                                'kind' => 'decimal_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                                'old_rules' => [
                                                    'kind' => 'array',
                                                    'element' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'rollout_percentage' => [
                                                                'kind' => 'decimal_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
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

    /**
     * Retrieve an activity log.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Iam\ActivityLog
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/iam/activity_logs/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'details' => [
                        'kind' => 'object',
                        'fields' => [
                            'radar' => [
                                'kind' => 'object',
                                'fields' => [
                                    'new_rules' => [
                                        'kind' => 'array',
                                        'element' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'rollout_percentage' => [
                                                    'kind' => 'decimal_string',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'old_rules' => [
                                        'kind' => 'array',
                                        'element' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'rollout_percentage' => [
                                                    'kind' => 'decimal_string',
                                                ],
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
