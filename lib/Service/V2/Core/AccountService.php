<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Core;

/**
 * @property Accounts\PersonService $persons
 * @property Accounts\PersonTokenService $personTokens
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class AccountService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'persons' => Accounts\PersonService::class,
        'personTokens' => Accounts\PersonTokenService::class,
    ];

    /**
     * Returns a list of Accounts.
     *
     * @param null|array{applied_configurations?: string[], closed?: bool, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Core\Account>
     *
     * @throws \Stripe\Exception\RateLimitException
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/core/accounts', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'configuration' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'card_creator' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'capabilities' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'commercial' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'celtic' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'charge_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                            ],
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                        'spend_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                                'cross_river_bank' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'charge_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                            ],
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                        'prepaid_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                            ],
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                        'spend_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                                'fifth_third' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'charge_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                                'lead' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'prepaid_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                                'stripe' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'charge_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                            ],
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                        'prepaid_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                        'consumer' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'celtic' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'revolving_credit_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                                'cross_river_bank' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'prepaid_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                                'lead' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'debit_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                            ],
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                        'prepaid_card' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                        'customer' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'capabilities' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'automatic_indirect_tax' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
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
                                        'merchant' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'capabilities' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'ach_debit_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'acss_debit_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'affirm_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'afterpay_clearpay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'alma_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'amazon_pay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'au_becs_debit_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'bacs_debit_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'bancontact_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'blik_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'boleto_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'card_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'cartes_bancaires_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'cashapp_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'eps_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'fpx_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'gb_bank_transfer_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'grabpay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'ideal_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'jcb_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'jp_bank_transfer_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'kakao_pay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'klarna_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'konbini_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'kr_card_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'link_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'mobilepay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'multibanco_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'mx_bank_transfer_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'naver_pay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'oxxo_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'p24_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'pay_by_bank_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'payco_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'paynow_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'promptpay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'revolut_pay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'samsung_pay_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'sepa_bank_transfer_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'sepa_debit_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'stripe_balance' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'payouts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                                        'swish_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'twint_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'us_bank_transfer_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'zip_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
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
                                        'recipient' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'capabilities' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'bank_accounts' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'instant' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'local' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'wire' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                                        'cards' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'crypto_wallets' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'paper_checks' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'protections' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'psp_migration' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'expires_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                                'requested_at' => [
                                                                                    'kind' => 'int64_string',
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                        'stripe_balance' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'payouts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'stripe_transfers' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                        'storer' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'capabilities' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'consumer' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'holds_currencies' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'usd' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'protections' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'psp_migration' => [
                                                                                            'kind' => 'object',
                                                                                            'fields' => [
                                                                                                'expires_at' => [
                                                                                                    'kind' => 'int64_string',
                                                                                                ],
                                                                                                'requested_at' => [
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
                                                        'financial_addresses' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'bank_accounts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'crypto_wallets' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                                        'holds_currencies' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'eur' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'gbp' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'usd' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'usdc' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                                        'inbound_transfers' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'bank_accounts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                                        'outbound_payments' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'bank_accounts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'cards' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'crypto_wallets' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'financial_accounts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'paper_checks' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                                        'outbound_transfers' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'bank_accounts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'crypto_wallets' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                                'financial_accounts' => [
                                                                    'kind' => 'object',
                                                                    'fields' => [
                                                                        'protections' => [
                                                                            'kind' => 'object',
                                                                            'fields' => [
                                                                                'psp_migration' => [
                                                                                    'kind' => 'object',
                                                                                    'fields' => [
                                                                                        'expires_at' => [
                                                                                            'kind' => 'int64_string',
                                                                                        ],
                                                                                        'requested_at' => [
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
                                'identity' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'individual' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'relationship' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'percent_ownership' => [
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
     * Removes access to the Account and its associated resources. Closed Accounts can
     * no longer be operated on, but limited information can still be retrieved through
     * the API in order to be able to track their history.
     *
     * @param string $id
     * @param null|array{applied_configurations?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\RateLimitException
     */
    public function close($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/accounts/%s/close', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'configuration' => [
                        'kind' => 'object',
                        'fields' => [
                            'card_creator' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'commercial' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'fifth_third' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'stripe' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'revolving_credit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'debit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                            'customer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'automatic_indirect_tax' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'merchant' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'ach_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'acss_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'affirm_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'afterpay_clearpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'alma_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'amazon_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'au_becs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bacs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bancontact_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'blik_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'boleto_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cartes_bancaires_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cashapp_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'eps_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'fpx_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'gb_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'grabpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'ideal_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jcb_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jp_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kakao_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'klarna_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'konbini_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kr_card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'link_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mobilepay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'multibanco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mx_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'naver_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'oxxo_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'p24_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'pay_by_bank_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'payco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paynow_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'promptpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'revolut_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'samsung_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'swish_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'twint_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'us_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'zip_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'recipient' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'instant' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'local' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'wire' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'cards' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'crypto_wallets' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paper_checks' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'stripe_transfers' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                            'storer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'holds_currencies' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'usd' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'financial_addresses' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'holds_currencies' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'eur' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'gbp' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'inbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'cards' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'paper_checks' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                    'identity' => [
                        'kind' => 'object',
                        'fields' => [
                            'individual' => [
                                'kind' => 'object',
                                'fields' => [
                                    'relationship' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_ownership' => [
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
     * Create an Account that represents a company, individual, or other entity that
     * your business interacts with. Accounts contain identifying information about the
     * entity, and configurations that store the features an account has access to. An
     * account can be configured as any or all of the following configurations:
     * Customer, Merchant and/or Recipient.
     *
     * @param null|array{account_token?: string, configuration?: array{card_creator?: array{capabilities?: array{commercial?: array{celtic?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, spend_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, cross_river_bank?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, spend_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, fifth_third?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, lead?: array{prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, stripe?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}}, consumer?: array{celtic?: array{revolving_credit_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, cross_river_bank?: array{prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, lead?: array{debit_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}}}}, customer?: array{automatic_indirect_tax?: array{exempt?: string, ip_address?: string, location_source?: string}, billing?: array{invoice?: array{custom_fields?: array{name: string, value: string}[], footer?: string, next_sequence?: int, prefix?: string, rendering?: array{amount_tax_display?: string, template?: string}}}, capabilities?: array{automatic_indirect_tax?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, shipping?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}, test_clock?: string}, merchant?: array{bacs_debit_payments?: array{display_name?: string}, branding?: array{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}, capabilities?: array{ach_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, acss_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, affirm_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, afterpay_clearpay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, alma_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, amazon_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, au_becs_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, bacs_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, bancontact_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, blik_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, boleto_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, card_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, cartes_bancaires_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, cashapp_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, eps_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, fpx_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, gb_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, grabpay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, ideal_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, jcb_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, jp_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, kakao_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, klarna_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, konbini_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, kr_card_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, link_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, mobilepay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, multibanco_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, mx_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, naver_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, oxxo_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, p24_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, pay_by_bank_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, payco_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, paynow_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, promptpay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, revolut_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, samsung_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, sepa_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, sepa_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, swish_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, twint_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, us_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, zip_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, card_payments?: array{decline_on?: array{avs_failure?: bool, cvc_failure?: bool}}, konbini_payments?: array{support?: array{email?: string, hours?: array{end_time?: string, start_time?: string}, phone?: string}}, mcc?: string, script_statement_descriptor?: array{kana?: array{descriptor?: string, prefix?: string}, kanji?: array{descriptor?: string, prefix?: string}}, smart_disputes?: array{auto_respond?: array{preference?: string}}, statement_descriptor?: array{descriptor?: string, prefix?: string}, support?: array{address?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, email?: string, phone?: string, url?: string}}, recipient?: array{capabilities?: array{bank_accounts?: array{instant?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, local?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, wire?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, cards?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, paper_checks?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, stripe_balance?: array{stripe_transfers?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}}}, storer?: array{capabilities?: array{consumer?: array{holds_currencies?: array{usd?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}}, financial_addresses?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, holds_currencies?: array{eur?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, gbp?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, usd?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, usdc?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, inbound_transfers?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, outbound_payments?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, cards?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, financial_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, paper_checks?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}, outbound_transfers?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}, financial_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested: bool}}}, high_risk_activities?: string[], high_risk_activities_description?: string, money_services_description?: string, operates_in_prohibited_countries?: bool, participates_in_regulated_activity?: bool, purpose_of_funds?: string, purpose_of_funds_description?: string, regulated_activity?: array{description?: string, license_number?: string, primary_regulatory_authority_country?: string, primary_regulatory_authority_name?: string}, source_of_funds?: string, source_of_funds_description?: string}}, contact_email?: string, contact_phone?: string, dashboard?: string, defaults?: array{currency?: string, locales?: string[], profile?: array{business_url?: string, doing_business_as?: string, product_description?: string}, responsibilities?: array{fees_collector: string, losses_collector: string, requirements_collector?: string}, timezone?: string}, display_name?: string, identity?: array{attestations?: array{directorship_declaration?: array{date?: string, ip?: string, user_agent?: string}, ownership_declaration?: array{date?: string, ip?: string, user_agent?: string}, persons_provided?: array{directors?: bool, executives?: bool, owners?: bool, ownership_exemption_reason?: string}, representative_declaration?: array{date?: string, ip?: string, user_agent?: string}, terms_of_service?: array{account?: array{date: string, ip: string, user_agent?: string}, card_creator?: array{commercial?: array{account_holder?: array{date: string, ip: string, user_agent?: string}, celtic?: array{apple_pay?: array{date: string, ip: string, user_agent?: string}, charge_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}, spend_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}}, cross_river_bank?: array{apple_pay?: array{date: string, ip: string, user_agent?: string}, charge_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}, prepaid_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}, spend_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}}}, fifth_third?: array{apple_pay?: array{date: string, ip: string, user_agent?: string}, charge_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}}, global_account_holder?: array{date: string, ip: string, user_agent?: string}, lead?: array{apple_pay?: array{date: string, ip: string, user_agent?: string}, prepaid_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}}}, consumer?: array{account_holder?: array{date: string, ip: string, user_agent?: string}, celtic?: array{apple_pay?: array{date: string, ip: string, user_agent?: string}, revolving_credit_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}}, cross_river_bank?: array{prepaid_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}}, global_account_holder?: array{date: string, ip: string, user_agent?: string}, lead?: array{debit_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}, prepaid_card?: array{bank_terms?: array{date: string, ip: string, user_agent?: string}, financing_disclosures?: array{date: string, ip: string, user_agent?: string}, platform?: array{date: string, ip: string, user_agent?: string}}}}}, consumer_privacy_disclosures?: array{date: string, ip: string, user_agent?: string}, consumer_storer?: array{date: string, ip: string, user_agent?: string}, crypto_storer?: array{date: string, ip: string, user_agent?: string}, storer?: array{date: string, ip: string, user_agent?: string}}}, business_details?: array{address?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, annual_revenue?: array{amount?: \Stripe\StripeObject, fiscal_year_end?: string}, compliance_screening_description?: string, documents?: array{bank_account_ownership_verification?: array{files: string[], type: string}, company_license?: array{files: string[], type: string}, company_memorandum_of_association?: array{files: string[], type: string}, company_ministerial_decree?: array{files: string[], type: string}, company_registration_verification?: array{files: string[], type: string}, company_tax_id_verification?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front: string}, type: string}, proof_of_address?: array{files: string[], type: string}, proof_of_registration?: array{files: string[], signer?: array{person: string}, type: string}, proof_of_ultimate_beneficial_ownership?: array{files: string[], signer?: array{person: string}, type: string}}, estimated_worker_count?: int, id_numbers?: array{registrar?: string, type: string, value: string}[], monthly_estimated_revenue?: array{amount?: \Stripe\StripeObject}, phone?: string, registered_name?: string, registration_date?: array{day: int, month: int, year: int}, script_addresses?: array{kana?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{registered_name?: string}, kanji?: array{registered_name?: string}}, structure?: string}, country?: string, entity_type?: string, individual?: array{additional_addresses?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, purpose: string, state?: string, town?: string}[], additional_names?: array{full_name?: string, given_name?: string, purpose: string, surname?: string}[], address?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, date_of_birth?: array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files: string[], type: string}, passport?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front: string}, type: string}, secondary_verification?: array{front_back: array{back?: string, front: string}, type: string}, visa?: array{files: string[], type: string}}, email?: string, given_name?: string, id_numbers?: array{type: string, value: string}[], legal_gender?: string, metadata?: array<string, string>, nationalities?: string[], phone?: string, political_exposure?: string, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: string, title?: string}, script_addresses?: array{kana?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{given_name?: string, surname?: string}, kanji?: array{given_name?: string, surname?: string}}, surname?: string}}, include?: string[], metadata?: array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\RateLimitException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/accounts', $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'identity' => [
                        'kind' => 'object',
                        'fields' => [
                            'individual' => [
                                'kind' => 'object',
                                'fields' => [
                                    'relationship' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_ownership' => [
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
                    'configuration' => [
                        'kind' => 'object',
                        'fields' => [
                            'card_creator' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'commercial' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'fifth_third' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'stripe' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'revolving_credit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'debit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                            'customer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'automatic_indirect_tax' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'merchant' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'ach_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'acss_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'affirm_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'afterpay_clearpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'alma_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'amazon_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'au_becs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bacs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bancontact_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'blik_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'boleto_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cartes_bancaires_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cashapp_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'eps_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'fpx_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'gb_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'grabpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'ideal_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jcb_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jp_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kakao_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'klarna_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'konbini_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kr_card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'link_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mobilepay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'multibanco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mx_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'naver_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'oxxo_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'p24_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'pay_by_bank_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'payco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paynow_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'promptpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'revolut_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'samsung_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'swish_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'twint_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'us_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'zip_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'recipient' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'instant' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'local' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'wire' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'cards' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'crypto_wallets' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paper_checks' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'stripe_transfers' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                            'storer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'holds_currencies' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'usd' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'financial_addresses' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'holds_currencies' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'eur' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'gbp' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'inbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'cards' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'paper_checks' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                    'identity' => [
                        'kind' => 'object',
                        'fields' => [
                            'individual' => [
                                'kind' => 'object',
                                'fields' => [
                                    'relationship' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_ownership' => [
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
     * Retrieves the details of an Account.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\RateLimitException
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/core/accounts/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'configuration' => [
                        'kind' => 'object',
                        'fields' => [
                            'card_creator' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'commercial' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'fifth_third' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'stripe' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'revolving_credit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'debit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                            'customer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'automatic_indirect_tax' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'merchant' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'ach_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'acss_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'affirm_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'afterpay_clearpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'alma_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'amazon_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'au_becs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bacs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bancontact_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'blik_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'boleto_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cartes_bancaires_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cashapp_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'eps_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'fpx_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'gb_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'grabpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'ideal_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jcb_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jp_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kakao_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'klarna_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'konbini_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kr_card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'link_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mobilepay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'multibanco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mx_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'naver_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'oxxo_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'p24_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'pay_by_bank_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'payco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paynow_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'promptpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'revolut_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'samsung_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'swish_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'twint_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'us_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'zip_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'recipient' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'instant' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'local' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'wire' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'cards' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'crypto_wallets' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paper_checks' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'stripe_transfers' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                            'storer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'holds_currencies' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'usd' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'financial_addresses' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'holds_currencies' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'eur' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'gbp' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'inbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'cards' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'paper_checks' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                    'identity' => [
                        'kind' => 'object',
                        'fields' => [
                            'individual' => [
                                'kind' => 'object',
                                'fields' => [
                                    'relationship' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_ownership' => [
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
     * Updates the details of an Account.
     *
     * @param string $id
     * @param null|array{account_token?: string, configuration?: array{card_creator?: array{applied?: bool, capabilities?: array{commercial?: array{celtic?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, spend_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, cross_river_bank?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, spend_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, fifth_third?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, lead?: array{prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, stripe?: array{charge_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}}, consumer?: array{celtic?: array{revolving_credit_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, cross_river_bank?: array{prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, lead?: array{debit_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, prepaid_card?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}}}}, customer?: array{applied?: bool, automatic_indirect_tax?: array{exempt?: string, ip_address?: string, location_source?: string, validate_location?: string}, billing?: array{default_payment_method?: string, invoice?: array{custom_fields?: array{name: string, value: string}[], footer?: string, next_sequence?: int, prefix?: string, rendering?: array{amount_tax_display?: string, template?: string}}}, capabilities?: array{automatic_indirect_tax?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, shipping?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string}, name?: string, phone?: string}, test_clock?: string}, merchant?: array{applied?: bool, bacs_debit_payments?: array{display_name?: string}, branding?: array{icon?: string, logo?: string, primary_color?: string, secondary_color?: string}, capabilities?: array{ach_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, acss_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, affirm_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, afterpay_clearpay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, alma_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, amazon_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, au_becs_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, bacs_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, bancontact_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, blik_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, boleto_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, card_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, cartes_bancaires_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, cashapp_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, eps_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, fpx_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, gb_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, grabpay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, ideal_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, jcb_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, jp_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, kakao_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, klarna_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, konbini_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, kr_card_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, link_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, mobilepay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, multibanco_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, mx_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, naver_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, oxxo_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, p24_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, pay_by_bank_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, payco_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, paynow_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, promptpay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, revolut_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, samsung_pay_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, sepa_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, sepa_debit_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, swish_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, twint_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, us_bank_transfer_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, zip_payments?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, card_payments?: array{decline_on?: array{avs_failure?: bool, cvc_failure?: bool}}, konbini_payments?: array{support?: array{email?: string, hours?: array{end_time?: string, start_time?: string}, phone?: string}}, mcc?: string, script_statement_descriptor?: array{kana?: array{descriptor?: string, prefix?: string}, kanji?: array{descriptor?: string, prefix?: string}}, smart_disputes?: array{auto_respond?: array{preference?: string}}, statement_descriptor?: array{descriptor?: string, prefix?: string}, support?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, email?: string, phone?: string, url?: string}}, recipient?: array{applied?: bool, capabilities?: array{bank_accounts?: array{instant?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, local?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, wire?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, cards?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, paper_checks?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, stripe_balance?: array{stripe_transfers?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}}, default_outbound_destination?: string}, storer?: array{applied?: bool, capabilities?: array{consumer?: array{holds_currencies?: array{usd?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}}, financial_addresses?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, holds_currencies?: array{eur?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, gbp?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, usd?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, usdc?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, inbound_transfers?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, outbound_payments?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, cards?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, financial_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, paper_checks?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}, outbound_transfers?: array{bank_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, crypto_wallets?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}, financial_accounts?: array{protections?: array{psp_migration: array{requested: bool}}, requested?: bool}}}, high_risk_activities?: string[], high_risk_activities_description?: string, money_services_description?: string, operates_in_prohibited_countries?: bool, participates_in_regulated_activity?: bool, purpose_of_funds?: string, purpose_of_funds_description?: string, regulated_activity?: array{description?: string, license_number?: string, primary_regulatory_authority_country?: string, primary_regulatory_authority_name?: string}, source_of_funds?: string, source_of_funds_description?: string}}, contact_email?: string, contact_phone?: string, dashboard?: string, defaults?: array{currency?: string, locales?: string[], profile?: array{business_url?: string, doing_business_as?: string, product_description?: string}, responsibilities?: array{fees_collector: string, losses_collector: string, requirements_collector?: string}, timezone?: string}, display_name?: string, identity?: array{attestations?: array{directorship_declaration?: array{date?: string, ip?: string, user_agent?: string}, ownership_declaration?: array{date?: string, ip?: string, user_agent?: string}, persons_provided?: array{directors?: bool, executives?: bool, owners?: bool, ownership_exemption_reason?: string}, representative_declaration?: array{date?: string, ip?: string, user_agent?: string}, terms_of_service?: array{account?: array{date?: string, ip?: string, user_agent?: string}, card_creator?: array{commercial?: array{account_holder?: array{date?: string, ip?: string, user_agent?: string}, celtic?: array{apple_pay?: array{date?: string, ip?: string, user_agent?: string}, charge_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}, spend_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, financing_disclosures?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}}, cross_river_bank?: array{apple_pay?: array{date?: string, ip?: string, user_agent?: string}, charge_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, financing_disclosures?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}, prepaid_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}, spend_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, financing_disclosures?: array{date?: string, ip?: string, user_agent?: string}}}, fifth_third?: array{apple_pay?: array{date?: string, ip?: string, user_agent?: string}, charge_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}}, global_account_holder?: array{date?: string, ip?: string, user_agent?: string}, lead?: array{apple_pay?: array{date?: string, ip?: string, user_agent?: string}, prepaid_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}}}, consumer?: array{account_holder?: array{date?: string, ip?: string, user_agent?: string}, celtic?: array{apple_pay?: array{date?: string, ip?: string, user_agent?: string}, revolving_credit_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, financing_disclosures?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}}, cross_river_bank?: array{prepaid_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, financing_disclosures?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}}, global_account_holder?: array{date?: string, ip?: string, user_agent?: string}, lead?: array{apple_pay?: array{date?: string, ip?: string, user_agent?: string}, debit_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, financing_disclosures?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}, prepaid_card?: array{bank_terms?: array{date?: string, ip?: string, user_agent?: string}, financing_disclosures?: array{date?: string, ip?: string, user_agent?: string}, platform?: array{date?: string, ip?: string, user_agent?: string}}}}}, consumer_privacy_disclosures?: array{date?: string, ip?: string, user_agent?: string}, consumer_storer?: array{date?: string, ip?: string, user_agent?: string}, crypto_storer?: array{date?: string, ip?: string, user_agent?: string}, storer?: array{date?: string, ip?: string, user_agent?: string}}}, business_details?: array{address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, annual_revenue?: array{amount?: \Stripe\StripeObject, fiscal_year_end?: string}, compliance_screening_description?: string, documents?: array{bank_account_ownership_verification?: array{files: string[], type: string}, company_license?: array{files: string[], type: string}, company_memorandum_of_association?: array{files: string[], type: string}, company_ministerial_decree?: array{files: string[], type: string}, company_registration_verification?: array{files: string[], type: string}, company_tax_id_verification?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, proof_of_address?: array{files: string[], type: string}, proof_of_registration?: array{files: string[], signer?: array{person: string}, type: string}, proof_of_ultimate_beneficial_ownership?: array{files: string[], signer?: array{person: string}, type: string}}, estimated_worker_count?: int, id_numbers?: array{registrar?: string, type: string, value: string}[], monthly_estimated_revenue?: array{amount?: \Stripe\StripeObject}, phone?: string, registered_name?: string, registration_date?: array{day: int, month: int, year: int}, script_addresses?: array{kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{registered_name?: string}, kanji?: array{registered_name?: string}}, structure?: string}, country?: string, entity_type?: string, individual?: array{additional_addresses?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, purpose: string, state?: string, town?: string}[], additional_names?: array{full_name?: string, given_name?: string, purpose: string, surname?: string}[], address?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, date_of_birth?: array{day: int, month: int, year: int}, documents?: array{company_authorization?: array{files: string[], type: string}, passport?: array{files: string[], type: string}, primary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, secondary_verification?: array{front_back: array{back?: string, front?: string}, type: string}, visa?: array{files: string[], type: string}}, email?: string, given_name?: string, id_numbers?: array{type: string, value: string}[], legal_gender?: string, metadata?: array<string, null|string>, nationalities?: string[], phone?: string, political_exposure?: string, relationship?: array{director?: bool, executive?: bool, owner?: bool, percent_ownership?: string, title?: string}, script_addresses?: array{kana?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}, kanji?: array{city?: string, country?: string, line1?: string, line2?: string, postal_code?: string, state?: string, town?: string}}, script_names?: array{kana?: array{given_name?: string, surname?: string}, kanji?: array{given_name?: string, surname?: string}}, surname?: string}}, include?: string[], metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Core\Account
     *
     * @throws \Stripe\Exception\RateLimitException
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/core/accounts/%s', $id), $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'identity' => [
                        'kind' => 'object',
                        'fields' => [
                            'individual' => [
                                'kind' => 'object',
                                'fields' => [
                                    'relationship' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_ownership' => [
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
                    'configuration' => [
                        'kind' => 'object',
                        'fields' => [
                            'card_creator' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'commercial' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'spend_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'fifth_third' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'stripe' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'charge_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'celtic' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'revolving_credit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'cross_river_bank' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                                    'lead' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'debit_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                ],
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                            'prepaid_card' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                            'customer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'automatic_indirect_tax' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'merchant' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'ach_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'acss_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'affirm_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'afterpay_clearpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'alma_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'amazon_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'au_becs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bacs_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'bancontact_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'blik_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'boleto_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cartes_bancaires_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'cashapp_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'eps_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'fpx_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'gb_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'grabpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'ideal_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jcb_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'jp_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kakao_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'klarna_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'konbini_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'kr_card_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'link_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mobilepay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'multibanco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'mx_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'naver_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'oxxo_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'p24_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'pay_by_bank_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'payco_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paynow_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'promptpay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'revolut_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'samsung_pay_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'sepa_debit_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'swish_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'twint_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'us_bank_transfer_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'zip_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
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
                            'recipient' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bank_accounts' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'instant' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'local' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'wire' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'cards' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'crypto_wallets' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'paper_checks' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'protections' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'psp_migration' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'expires_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                    'requested_at' => [
                                                                        'kind' => 'int64_string',
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'stripe_balance' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'payouts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'stripe_transfers' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                            'storer' => [
                                'kind' => 'object',
                                'fields' => [
                                    'capabilities' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'consumer' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'holds_currencies' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'usd' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'protections' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'psp_migration' => [
                                                                                'kind' => 'object',
                                                                                'fields' => [
                                                                                    'expires_at' => [
                                                                                        'kind' => 'int64_string',
                                                                                    ],
                                                                                    'requested_at' => [
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
                                            'financial_addresses' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'holds_currencies' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'eur' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'gbp' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usd' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'usdc' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'inbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_payments' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'cards' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'paper_checks' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                                            'outbound_transfers' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'bank_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'crypto_wallets' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'financial_accounts' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'protections' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'psp_migration' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'expires_at' => [
                                                                                'kind' => 'int64_string',
                                                                            ],
                                                                            'requested_at' => [
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
                    'identity' => [
                        'kind' => 'object',
                        'fields' => [
                            'individual' => [
                                'kind' => 'object',
                                'fields' => [
                                    'relationship' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_ownership' => [
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
