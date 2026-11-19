<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property Groups\InvoiceService $invoices
 * @property Groups\SpendModifierRuleService $spendModifierRules
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class GroupService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'invoices' => Groups\InvoiceService::class,
        'spendModifierRules' => Groups\SpendModifierRuleService::class,
    ];

    /**
     * List Billing Groups.
     *
     * @param null|array{customer?: string, limit?: int, lookup_keys?: string[], test_clock?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\Group>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/groups', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'billing_settings' => [
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
                                'invoice_discount_rules' => [
                                    'kind' => 'array',
                                    'element' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'percent_off' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'percent_off' => [
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
        ]);
    }

    /**
     * Cancel a BillingGroup.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Group
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/groups/%s/cancel', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_settings' => [
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
                    'invoice_discount_rules' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'percent_off' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'percent_off' => [
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
     * Create a BillingGroup.
     *
     * @param null|array{billing_settings?: array{collection_method?: string, email_delivery?: array{payment_due?: array{enabled?: bool, include_payment_link?: bool}}, invoice_presentation?: array{invoice_rendering_template?: string}, invoice_time_until_due?: array{interval: string, interval_count: int}, payment_method_configuration?: string, payment_method_options?: array{acss_debit?: array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: array{preferred_language?: string}, card?: array{mandate_options?: array{amount?: int, amount_type?: string, description?: string}, network?: string, request_three_d_secure?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, konbini?: array{}, sepa_debit?: array{}, us_bank_account?: array{financial_connections: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[]}, verification_method: string}}, tax?: array{type?: string}}, customer: string, default_payment_method?: string, grouping_behavior?: array{by_cadence?: array{billing_cycle_anchor?: string, day?: array{time: array{hour: int, minute: int, second: int}}, interval_count?: int, month?: array{day_of_month: int, month_of_year?: int, time?: array{hour: int, minute: int, second: int}}, type: string, week?: array{day_of_week: int, time?: array{hour: int, minute: int, second: int}}, year?: array{day_of_month: int, month_of_year: int, time?: array{hour: int, minute: int, second: int}}}, type: string}, include?: string[], lookup_key?: string, metadata?: array<string, string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Group
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/groups', $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_settings' => [
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
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_settings' => [
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
                    'invoice_discount_rules' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'percent_off' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'percent_off' => [
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
     * Retrieve a BillingGroup.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Group
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/groups/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_settings' => [
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
                    'invoice_discount_rules' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'percent_off' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'percent_off' => [
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
     * Update a BillingGroup.
     *
     * @param string $id
     * @param null|array{billing_settings?: array{collection_method?: string, email_delivery?: array{payment_due?: array{enabled?: bool, include_payment_link?: bool}}, invoice_presentation?: array{invoice_rendering_template?: string}, invoice_time_until_due?: array{interval: string, interval_count: int}, payment_method_configuration?: string, payment_method_options?: array{acss_debit?: array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: array{preferred_language?: string}, card?: array{mandate_options?: array{amount?: int, amount_type?: string, description?: string}, network?: string, request_three_d_secure?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, konbini?: array{}, sepa_debit?: array{}, us_bank_account?: array{financial_connections: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[]}, verification_method: string}}, tax?: array{type: string}}, default_payment_method?: string, include?: string[], lookup_key?: string, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Group
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/groups/%s', $id), $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_settings' => [
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
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_settings' => [
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
                    'invoice_discount_rules' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'percent_off' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'percent_off' => [
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

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
