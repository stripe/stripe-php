<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Signals;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountSignalService extends \Stripe\Service\AbstractService
{
    /**
     * Lists the latest AccountSignals for a given account or customer, filtered by
     * signal type. Note that this endpoint returns only the latest signal for each
     * requested signal type.
     *
     * @param null|array{account_details?: array{account?: string, customer?: string}, limit?: int, type: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Signals\AccountSignal>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/signals/account_signals', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'fraudulent_merchant' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'probability' => [
                                            'kind' => 'decimal_string',
                                        ],
                                    ],
                                ],
                                'merchant_delinquency' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'probability' => [
                                            'kind' => 'decimal_string',
                                        ],
                                    ],
                                ],
                                'payment_delinquency_exposure' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'additional_details' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'gross_exposure_amount' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'value' => [
                                                            'kind' => 'int64_string',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'exposure_amount' => [
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
            ],
        ]);
    }

    /**
     * Retrieves an AccountSignal by its ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Signals\AccountSignal
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/signals/account_signals/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'fraudulent_merchant' => [
                        'kind' => 'object',
                        'fields' => [
                            'probability' => ['kind' => 'decimal_string'],
                        ],
                    ],
                    'merchant_delinquency' => [
                        'kind' => 'object',
                        'fields' => [
                            'probability' => ['kind' => 'decimal_string'],
                        ],
                    ],
                    'payment_delinquency_exposure' => [
                        'kind' => 'object',
                        'fields' => [
                            'additional_details' => [
                                'kind' => 'object',
                                'fields' => [
                                    'gross_exposure_amount' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'value' => [
                                                'kind' => 'int64_string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            'exposure_amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'value' => ['kind' => 'int64_string'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
