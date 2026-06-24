<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core\Health;

/**
 * @property Alerts\HistoryService $history
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AlertService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = ['history' => Alerts\HistoryService::class];

    /**
     * Retrieves a list of health alerts.
     *
     * @param null|array{created?: string, created_gt?: string, created_gte?: string, created_lt?: string, created_lte?: string, limit?: int, severity?: string, status?: string, types?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\Health\Alert>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/health/alerts', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'api_error' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'impacted_requests_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                        'top_impacted_accounts' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'impacted_requests_percentage' => [
                                                        'kind' => 'decimal_string',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'api_latency' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'impacted_requests_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                        'top_impacted_accounts' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'impacted_requests_percentage' => [
                                                        'kind' => 'decimal_string',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'authorization_rate_drop' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'current_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                        'previous_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                    ],
                                ],
                                'invoice_count_dropped' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'observed_count' => [
                                            'kind' => 'decimal_string',
                                        ],
                                        'threshold_count' => [
                                            'kind' => 'decimal_string',
                                        ],
                                    ],
                                ],
                                'payment_method_error' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'impacted_requests_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                        'top_impacted_accounts' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'impacted_requests_percentage' => [
                                                        'kind' => 'decimal_string',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'sepa_debit_delayed' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'impacted_payments_percentage' => [
                                            'kind' => 'decimal_string',
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
     * Retrieves a health alert by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Health\Alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/health/alerts/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'api_error' => [
                        'kind' => 'object',
                        'fields' => [
                            'impacted_requests_percentage' => [
                                'kind' => 'decimal_string',
                            ],
                            'top_impacted_accounts' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'impacted_requests_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'api_latency' => [
                        'kind' => 'object',
                        'fields' => [
                            'impacted_requests_percentage' => [
                                'kind' => 'decimal_string',
                            ],
                            'top_impacted_accounts' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'impacted_requests_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'authorization_rate_drop' => [
                        'kind' => 'object',
                        'fields' => [
                            'current_percentage' => [
                                'kind' => 'decimal_string',
                            ],
                            'previous_percentage' => [
                                'kind' => 'decimal_string',
                            ],
                        ],
                    ],
                    'invoice_count_dropped' => [
                        'kind' => 'object',
                        'fields' => [
                            'observed_count' => ['kind' => 'decimal_string'],
                            'threshold_count' => ['kind' => 'decimal_string'],
                        ],
                    ],
                    'payment_method_error' => [
                        'kind' => 'object',
                        'fields' => [
                            'impacted_requests_percentage' => [
                                'kind' => 'decimal_string',
                            ],
                            'top_impacted_accounts' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'impacted_requests_percentage' => [
                                            'kind' => 'decimal_string',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'sepa_debit_delayed' => [
                        'kind' => 'object',
                        'fields' => [
                            'impacted_payments_percentage' => [
                                'kind' => 'decimal_string',
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
