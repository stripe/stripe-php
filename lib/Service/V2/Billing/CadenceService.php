<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property Cadences\SpendModifierRuleService $spendModifierRules
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class CadenceService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'spendModifierRules' => Cadences\SpendModifierRuleService::class,
    ];

    /**
     * List Billing Cadences.
     *
     * @param null|array{include?: string[], limit?: int, lookup_keys?: string[], payer?: array{customer?: string, type: string}, test_clock?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\Cadence>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/cadences', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'settings_data' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'collection' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'payment_method_options' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'card' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'mandate_options' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'amount' => [
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
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Cancel the Billing Cadence.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/cadences/%s/cancel', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'settings_data' => [
                        'kind' => 'object',
                        'fields' => [
                            'collection' => [
                                'kind' => 'object',
                                'fields' => [
                                    'payment_method_options' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'card' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'mandate_options' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'amount' => [
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
                    ],
                ],
            ],
        ]);
    }

    /**
     * Create a Billing Cadence object.
     *
     * @param null|array{billing_cycle: array{interval_count?: int, type: string, day?: array{time?: array{hour: int, minute: int, second: int}}, month?: array{day_of_month: int, month_of_year?: int, time?: array{hour: int, minute: int, second: int}}, week?: array{day_of_week: int, time?: array{hour: int, minute: int, second: int}}, year?: array{day_of_month?: int, month_of_year?: int, time?: array{hour: int, minute: int, second: int}}}, include?: string[], lookup_key?: string, metadata?: array<string, string>, payer: array{billing_profile: string}, settings?: array{bill?: array{id: string, version?: string}, collection?: array{id: string, version?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/cadences', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'settings_data' => [
                        'kind' => 'object',
                        'fields' => [
                            'collection' => [
                                'kind' => 'object',
                                'fields' => [
                                    'payment_method_options' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'card' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'mandate_options' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'amount' => [
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
                    ],
                ],
            ],
        ]);
    }

    /**
     * Retrieve a Billing Cadence object.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/cadences/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'settings_data' => [
                        'kind' => 'object',
                        'fields' => [
                            'collection' => [
                                'kind' => 'object',
                                'fields' => [
                                    'payment_method_options' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'card' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'mandate_options' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'amount' => [
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
                    ],
                ],
            ],
        ]);
    }

    /**
     * Update a Billing Cadence object.
     *
     * @param string $id
     * @param null|array{include?: string[], lookup_key?: string, metadata?: array<string, null|string>, payer?: array{billing_profile?: string}, settings?: array{bill?: array{id: string, version?: string}, collection?: array{id: string, version?: string}}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Cadence
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/cadences/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'settings_data' => [
                        'kind' => 'object',
                        'fields' => [
                            'collection' => [
                                'kind' => 'object',
                                'fields' => [
                                    'payment_method_options' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'card' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'mandate_options' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'amount' => [
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
