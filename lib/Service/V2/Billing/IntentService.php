<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property Intents\ActionService $actions
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class IntentService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = ['actions' => Intents\ActionService::class];

    /**
     * List Billing Intents.
     *
     * @param null|array{limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\Intent>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/intents', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'billing_group_data' => [
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
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }

    /**
     * Cancel a Billing Intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/cancel', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_group_data' => [
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
                ],
            ],
        ]);
    }

    /**
     * Commit a Billing Intent.
     *
     * @param string $id
     * @param null|array{payment_intent?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function commit($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/commit', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_group_data' => [
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
                ],
            ],
        ]);
    }

    /**
     * Create a Billing Intent.
     *
     * @param null|array{actions: array{apply?: array{discount?: array{coupon?: string, promotion_code?: string, type: string}, effective_at?: array{timestamp?: string, type: string}, invoice_discount_rule?: array{applies_to: string, percent_off?: array{maximum_applications: array{type: string}, percent_off: string}, type: string}, spend_modifier_rule?: array{applies_to: string, max_billing_period_spend?: array{amount: array{custom_pricing_unit?: array{id?: string, value: string}, type: string}, custom_pricing_unit_overage_rate: array{id: string}}, type: string}, type: string}, deactivate?: array{cancellation_details?: array{comment?: string, feedback?: string}, collect_at?: string, effective_at?: array{timestamp?: string, type: string}, pricing_plan_subscription_details: array{overrides?: array{partial_period_behaviors: array{license_fee?: array{credit_proration_behavior: string}, type: string}[]}, pricing_plan_subscription: string}, type: string}, modify?: array{collect_at?: string, effective_at?: array{timestamp?: string, type: string}, pricing_plan_subscription_details: array{component_configurations?: array{lookup_key?: string, pricing_plan_component?: string, quantity?: int}[], new_pricing_plan?: string, new_pricing_plan_version?: string, overrides?: array{partial_period_behaviors: array{license_fee?: array{credit_proration_behavior: string, debit_proration_behavior: string}, recurring_credit_grant?: array{create_behavior: string}, type: string}[]}, pricing_plan_subscription: string}, type: string}, remove?: array{effective_at?: array{type: string}, invoice_discount_rule?: string, spend_modifier_rule?: string, type: string}, subscribe?: array{collect_at?: string, effective_at?: array{timestamp?: string, type: string}, pricing_plan_subscription_details?: array{component_configurations?: array{lookup_key?: string, pricing_plan_component?: string, quantity?: int}[], metadata?: array<string, string>, overrides?: array{partial_period_behaviors: array{license_fee?: array{debit_proration_behavior: string}, recurring_credit_grant?: array{create_behavior: string}, type: string}[]}, pricing_plan: string, pricing_plan_version: string}, type: string, v1_subscription_details?: array{description?: string, items: array{metadata?: array<string, string>, price: string, quantity?: int}[], metadata?: array<string, string>}}, type: string}[], billing_group?: string, billing_group_data?: array{billing_settings?: array{collection_method?: string, email_delivery?: array{payment_due?: array{enabled?: bool, include_payment_link?: bool}}, invoice_presentation?: array{invoice_rendering_template?: string}, invoice_time_until_due?: array{interval: string, interval_count: int}, payment_method_configuration?: string, payment_method_options?: array{acss_debit?: array{mandate_options?: array{transaction_type?: string}, verification_method?: string}, bancontact?: array{preferred_language?: string}, card?: array{mandate_options?: array{amount?: int, amount_type?: string, description?: string}, network?: string, request_three_d_secure?: string}, customer_balance?: array{bank_transfer?: array{eu_bank_transfer?: array{country: string}, type?: string}, funding_type?: string}, konbini?: array{}, sepa_debit?: array{}, us_bank_account?: array{financial_connections: array{filters?: array{account_subcategories?: string[]}, permissions?: string[], prefetch?: string[]}, verification_method: string}}, tax?: array{type?: string}}, customer: string, default_payment_method?: string, grouping_behavior?: array{by_cadence?: array{billing_cycle_anchor?: string, day?: array{time: array{hour: int, minute: int, second: int}}, interval_count?: int, month?: array{day_of_month: int, month_of_year?: int, time?: array{hour: int, minute: int, second: int}}, type: string, week?: array{day_of_week: int, time?: array{hour: int, minute: int, second: int}}, year?: array{day_of_month: int, month_of_year: int, time?: array{hour: int, minute: int, second: int}}}, type: string}, lookup_key?: string}, currency: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/intents', $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'actions' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'apply' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'invoice_discount_rule' => [
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
                    'billing_group_data' => [
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
                ],
            ],
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_group_data' => [
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
                ],
            ],
        ]);
    }

    /**
     * Release a Billing Intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function releaseReservation($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/release_reservation', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_group_data' => [
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
                ],
            ],
        ]);
    }

    /**
     * Reserve a Billing Intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function reserve($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/intents/%s/reserve', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_group_data' => [
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
                ],
            ],
        ]);
    }

    /**
     * Retrieve a Billing Intent.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Intent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/intents/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'billing_group_data' => [
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
                ],
            ],
        ]);
    }

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
