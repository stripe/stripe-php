<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Contracts;

/**
 * @property Terms\QuantityChangeService $quantityChanges
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class TermService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'quantityChanges' => Terms\QuantityChangeService::class,
    ];

    /**
     * List the terms on a contract, optionally filtered by type.
     *
     * @param string $id
     * @param null|array{limit?: int, type?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\ContractTerm>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function allContractTerms($id, $params = null, $opts = null)
    {
        return $this->requestCollection('get', $this->buildPath('/v2/billing/contracts/%s/terms', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'pricing_override' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'multiply' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'factor' => [
                                                    'kind' => 'decimal_string',
                                                ],
                                            ],
                                        ],
                                        'overwrite' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'unit_amount_decimal' => [
                                                    'kind' => 'decimal_string',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'recurring_price' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'quantity' => [
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
     * Retrieve a term on a contract.
     *
     * @param string $parentId
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\ContractTerm
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieveContractTerm($parentId, $id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/contracts/%s/terms/%s', $parentId, $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'pricing_override' => [
                        'kind' => 'object',
                        'fields' => [
                            'multiply' => [
                                'kind' => 'object',
                                'fields' => [
                                    'factor' => ['kind' => 'decimal_string'],
                                ],
                            ],
                            'overwrite' => [
                                'kind' => 'object',
                                'fields' => [
                                    'unit_amount_decimal' => [
                                        'kind' => 'decimal_string',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'recurring_price' => [
                        'kind' => 'object',
                        'fields' => [
                            'quantity' => ['kind' => 'decimal_string'],
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
