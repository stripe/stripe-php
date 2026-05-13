<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement\FinancialAccounts;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class StatementService extends \Stripe\Service\AbstractService
{
    /**
     * Returns a list of statements for a Financial Account.
     *
     * @param string $id
     * @param null|array{limit?: int, order_by?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\MoneyManagement\FinancialAccountStatement>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/money_management/financial_accounts/%s/statements', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'files_by_currency' => [
                                    'kind' => 'array',
                                    'element' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'size' => [
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
        ]);
    }

    /**
     * Retrieves the details of a Financial Account Statement.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\MoneyManagement\FinancialAccountStatement
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/money_management/financial_accounts/%s/statements/%s', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'files_by_currency' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => ['size' => ['kind' => 'int64_string']],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
