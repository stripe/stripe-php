<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ServiceActionService extends \Stripe\Service\AbstractService
{
    /**
     * Create a Service Action object.
     *
     * @param null|array{credit_grant?: array{amount: array{custom_pricing_unit?: array{id: string, value: string}, monetary?: \Stripe\StripeObject, type: string}, applicability_config: array{scope: array{billable_items?: string[], price_type?: string}}, category?: string, expiry_config: array{type: string}, name: string, priority?: int}, credit_grant_per_tenant?: array{amount: array{custom_pricing_unit?: array{id: string, value: string}, monetary?: \Stripe\StripeObject, type: string}, applicability_config: array{scope: array{billable_items?: string[], price_type?: string}}, category?: string, expiry_config: array{type: string}, grant_condition: array{meter_event_first_per_period?: array{meter_segment_conditions: array{dimension?: array{payload_key: string, value: string}, type: string}[]}, type: string}, name: string, priority?: int}, lookup_key?: string, service_interval: string, service_interval_count: int, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\ServiceAction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/service_actions', $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'credit_grant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
                                                'kind' => 'decimal_string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'credit_grant_per_tenant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
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
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'credit_grant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
                                                'kind' => 'decimal_string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'credit_grant_per_tenant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
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
        ]);
    }

    /**
     * Retrieve a Service Action object.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\ServiceAction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/service_actions/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'credit_grant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
                                                'kind' => 'decimal_string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'credit_grant_per_tenant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
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
        ]);
    }

    /**
     * Update a ServiceAction object.
     *
     * @param string $id
     * @param null|array{credit_grant?: array{name?: string}, credit_grant_per_tenant?: array{name?: string}, lookup_key?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\ServiceAction
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/service_actions/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'credit_grant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
                                                'kind' => 'decimal_string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'credit_grant_per_tenant' => [
                        'kind' => 'object',
                        'fields' => [
                            'amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'custom_pricing_unit' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
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
        ]);
    }
}
