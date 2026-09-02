<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * @property FinancialAccounts\StatementService $statements
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class FinancialAccountService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'statements' => FinancialAccounts\StatementService::class,
    ];

    /**
     * Lists FinancialAccounts in this compartment.
     *
     * @param null|array{include?: string[], limit?: int, statuses?: string[], types?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\FinancialAccount>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/money_management/financial_accounts', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'savings' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'interest' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'rate' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'percentage' => [
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
        ]);
    }

    /**
     * Closes a FinancialAccount with or without forwarding settings.
     *
     * @param string $id
     * @param null|array{forwarding_settings?: array{payment_method?: string, payout_method?: string}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\NonZeroBalanceException
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/financial_accounts/%s/close', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'savings' => [
                        'kind' => 'object',
                        'fields' => [
                            'interest' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percentage' => [
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
     * Creates a new FinancialAccount.
     *
     * @param null|array{display_name?: string, metadata?: array<string, string>, savings?: array{holds_currencies: string[]}, storage?: array{funds_usage_type?: string, holds_currencies: string[]}, type: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\AlreadyExistsException
     * @throws \Stripe\Exception\FeatureNotEnabledException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/money_management/financial_accounts', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'savings' => [
                        'kind' => 'object',
                        'fields' => [
                            'interest' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percentage' => [
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
     * Retrieves the details of an existing FinancialAccount.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/financial_accounts/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'savings' => [
                        'kind' => 'object',
                        'fields' => [
                            'interest' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percentage' => [
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
     * Updates an existing FinancialAccount.
     *
     * @param string $id
     * @param null|array{display_name?: string, metadata?: array<string, null|string>, storage?: array{holds_currencies?: string[]}} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccount
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/money_management/financial_accounts/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'savings' => [
                        'kind' => 'object',
                        'fields' => [
                            'interest' => [
                                'kind' => 'object',
                                'fields' => [
                                    'rate' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percentage' => [
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

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
