<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property Contracts\LicensePricing\LicensePricingServiceFactory $licensePricing
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ContractService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'licensePricing' => Contracts\LicensePricing\LicensePricingServiceFactory::class,
    ];

    /**
     * Activate a Draft Contract object by ID.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Contract
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activate($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/contracts/%s/activate', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'one_time_fees' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'bill_schedule' => [
                                    'kind' => 'array',
                                    'element' => [
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
                    'pricing_overrides' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'overwrite_price' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'tiers' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'up_to_decimal' => [
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
     * List Contract objects with pagination.
     *
     * @param null|array{customer?: string, limit?: int} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\Contract>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/contracts', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'one_time_fees' => [
                                    'kind' => 'array',
                                    'element' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'bill_schedule' => [
                                                'kind' => 'array',
                                                'element' => [
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
                                'pricing_overrides' => [
                                    'kind' => 'array',
                                    'element' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'overwrite_price' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'tiers' => [
                                                        'kind' => 'array',
                                                        'element' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'up_to_decimal' => [
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
                ],
            ],
        ]);
    }

    /**
     * Cancel a Contract object by ID.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Contract
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/contracts/%s/cancel', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'one_time_fees' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'bill_schedule' => [
                                    'kind' => 'array',
                                    'element' => [
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
                    'pricing_overrides' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'overwrite_price' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'tiers' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'up_to_decimal' => [
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
     * Create a Contract object.
     *
     * @param null|array{billing_settings?: array{contract_billing_details?: array{bill_settings_details?: array{calculation?: array{tax?: array{type: string}}, invoice?: array{time_until_due?: array{interval: string, interval_count: int}}}, billing_profile_details: array{customer: string, default_payment_method?: string}, collection_settings_details: array{collection_method: string, payment_method_configuration?: string}}}, contract_lines: array{ends_at: array{timestamp: string}, metadata?: array<string, string>, overrides: array{ends_at: array{timestamp: string}, service_action?: array{add?: array{credit_grant?: array{amount: array{monetary?: \Stripe\StripeObject, type: string}, applicability_config: array{scope: array{billable_items?: string[], price_type?: string}}, category?: string, expiry_config: array{type: string}, name: string, priority?: int}, service_interval: string, service_interval_count: int, type: string}, replace?: array{credit_grant?: array{amount: array{monetary?: \Stripe\StripeObject, type: string}, applicability_config: array{scope: array{billable_items?: string[], price_type?: string}}, category?: string, expiry_config: array{type: string}, name: string, priority?: int}, id?: string, lookup_key?: string, service_interval: string, service_interval_count: int, type: string}, type: string}, starts_at: array{timestamp: string}, type: string}[], pricing: array{}, starts_at: array{timestamp: string}}[], contract_number: string, currency: string, include?: string[], license_quantity_actions: array{effective_at: array{timestamp?: string, type: string}, license_pricing_id?: string, license_pricing_lookup_key?: string, license_pricing_type: string, pricing_line?: string, set?: array{quantity: int}, type: string}[], metadata?: array<string, string>, one_time_fees?: array{bill_schedule: array{bill_at: array{timestamp?: string, type: string}, value: int}[], billable_item_type: string, product_details?: array{product: string}}[], pricing_lines: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, metadata?: array<string, string>, pricing: array{price_details?: array{price: string, quantity?: int}, type: string}, starts_at: array{timestamp?: string, type: string}}[], pricing_overrides: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, multiplier?: array{criteria?: array{billable_item_ids: string[], billable_item_lookup_keys: string[], billable_item_types: string[], metadata_conditions: array{all_of: array{key: string, value: string}[]}[], rate_card_ids: string[], type: string}[], factor: string}, overwrite_price?: array{price: string, tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], unit_amount?: string}, priority: int, starts_at: array{timestamp?: string, type: string}, type: string}[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Contract
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/contracts', $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'one_time_fees' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'bill_schedule' => [
                                    'kind' => 'array',
                                    'element' => [
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
                    'pricing_overrides' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'overwrite_price' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'tiers' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'up_to_decimal' => [
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
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'one_time_fees' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'bill_schedule' => [
                                    'kind' => 'array',
                                    'element' => [
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
                    'pricing_overrides' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'overwrite_price' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'tiers' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'up_to_decimal' => [
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
     * Retrieve a Contract object by ID.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Contract
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/contracts/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'one_time_fees' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'bill_schedule' => [
                                    'kind' => 'array',
                                    'element' => [
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
                    'pricing_overrides' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'overwrite_price' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'tiers' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'up_to_decimal' => [
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
     * Update a Contract object by ID.
     *
     * @param string $id
     * @param null|array{include?: string[], license_quantity_actions?: array{effective_at: array{timestamp?: string, type: string}, license_pricing_id?: string, license_pricing_lookup_key?: string, license_pricing_type: string, pricing_line?: string, pricing_line_lookup_key?: string, set?: array{quantity: int}, type: string}[], pricing_line_actions?: array{add?: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, metadata?: array<string, string>, pricing: array{price_details?: array{price: string, quantity?: int}, type: string}, starts_at: array{timestamp?: string, type: string}}, remove?: array{id: string}, type: string, update?: array{ends_at?: array{timestamp?: string, type: string}, id: string, starts_at?: array{timestamp?: string, type: string}}}[], pricing_override_actions?: array{add?: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, multiplier?: array{criteria: array{billable_item_ids: string[], billable_item_lookup_keys: string[], billable_item_types: string[], metadata_conditions: array{all_of: array{key: string, value: string}[]}[], rate_card_ids: string[], type: string}[], factor: string}, overwrite_price?: array{price: string, tiering_mode?: string, tiers: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], unit_amount?: string}, priority: int, starts_at: array{timestamp?: string, type: string}, type: string}, remove?: array{id: string}, type: string, update?: array{ends_at?: array{timestamp?: string, type: string}, id: string, starts_at?: array{timestamp?: string, type: string}}}[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\Contract
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/contracts/%s', $id), $params, $opts, [
            'request_schema' => [
                'kind' => 'object',
                'fields' => [
                    'pricing_override_actions' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'add' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'overwrite_price' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'tiers' => [
                                                    'kind' => 'array',
                                                    'element' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'up_to_decimal' => [
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
            ],
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'one_time_fees' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'bill_schedule' => [
                                    'kind' => 'array',
                                    'element' => [
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
                    'pricing_overrides' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'overwrite_price' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'tiers' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'up_to_decimal' => [
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

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
