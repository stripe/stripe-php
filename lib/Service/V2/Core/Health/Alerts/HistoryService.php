<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core\Health\Alerts;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class HistoryService extends \Stripe\Service\AbstractService
{
    /**
     * Retrieves a list of alert history entries for a health alert.
     *
     * @param string $id
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\Health\AlertHistoryEntry>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/core/health/alerts/%s/history', $id), $params, $opts, [
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
}
