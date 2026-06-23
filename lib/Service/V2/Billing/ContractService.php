<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @property Contracts\PricingLines\PricingLinesServiceFactory $pricingLines
 *
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class ContractService extends \Stripe\Service\AbstractService
{
    use \Stripe\Service\ServiceNavigatorTrait;

    protected static $classMap = [
        'pricingLines' => Contracts\PricingLines\PricingLinesServiceFactory::class,
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
                    'pricing_lines' => [
                        'kind' => 'object',
                        'fields' => [
                            'data' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'pricing' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'price_details' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'current_quantity' => [
                                                            'kind' => 'decimal_string',
                                                        ],
                                                        'pricing_overrides' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'data' => [
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
     * @param null|array{customer?: string, include?: string[], limit?: int} $params
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
                                'pricing_lines' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'data' => [
                                            'kind' => 'array',
                                            'element' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'pricing' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'price_details' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'current_quantity' => [
                                                                        'kind' => 'decimal_string',
                                                                    ],
                                                                    'pricing_overrides' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'data' => [
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
     * @param null|array{cancel_pricing_lines?: array{id?: string, lookup_key?: string, proration_behavior?: string}[], include?: string[], proration_behavior?: string} $params
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
                    'pricing_lines' => [
                        'kind' => 'object',
                        'fields' => [
                            'data' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'pricing' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'price_details' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'current_quantity' => [
                                                            'kind' => 'decimal_string',
                                                        ],
                                                        'pricing_overrides' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'data' => [
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
     * @param null|array{billing_cycle_anchor?: array{config?: array{day_of_month: int, hour?: int, minute?: int, month_of_year?: int, second?: int}, timestamp?: string, type: string}, billing_settings?: array{bill_settings_details?: array{calculation?: array{tax?: array{type: string}}, invoice?: array{time_until_due?: array{interval: string, interval_count: int}}}, billing_profile_details: array{customer: string, default_payment_method?: string}, collection_settings_details: array{collection_method: string, payment_method_configuration?: string}}, contract_number: string, currency: string, include?: string[], metadata?: array<string, string>, one_time_fees?: array{amount: \Stripe\StripeObject, bill_at: array{timestamp?: string, type: string}, lookup_key?: string, product: string}[], pricing_lines: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, metadata?: array<string, string>, pricing: array{price_details?: array{price: string, pricing_overrides?: array{ends_at?: array{timestamp?: string, type: string}, lookup_key?: string, metadata?: array<string, string>, overwrite_price?: array{tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], unit_amount?: string}, priority?: int, starts_at?: array{timestamp?: string, type: string}, type: string}[], quantity_changes?: array{effective_at: array{timestamp?: string, type: string}, set: string}[]}, type: string}, starts_at: array{timestamp?: string, type: string}}[], pricing_overrides?: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, multiplier?: array{criteria?: array{pricing_line_ids?: string[], pricing_line_lookup_keys?: string[], type: string}[], factor: string}, priority: int, starts_at: array{timestamp?: string, type: string}, type: string}[]} $params
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
                    'pricing_lines' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'pricing' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'price_details' => [
                                            'kind' => 'object',
                                            'fields' => [
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
                                                'quantity_changes' => [
                                                    'kind' => 'array',
                                                    'element' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'set' => [
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
                    'pricing_lines' => [
                        'kind' => 'object',
                        'fields' => [
                            'data' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'pricing' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'price_details' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'current_quantity' => [
                                                            'kind' => 'decimal_string',
                                                        ],
                                                        'pricing_overrides' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'data' => [
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
     * Delete a draft Contract object by ID.
     *
     * @param string $id
     * @param null|array $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\DeletedObject
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($id, $params = null, $opts = null)
    {
        return $this->request('delete', $this->buildPath('/v2/billing/contracts/%s', $id), $params, $opts);
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
                    'pricing_lines' => [
                        'kind' => 'object',
                        'fields' => [
                            'data' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'pricing' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'price_details' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'current_quantity' => [
                                                            'kind' => 'decimal_string',
                                                        ],
                                                        'pricing_overrides' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'data' => [
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
     * @param null|array{include?: string[], pricing_line_actions?: array{add?: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, metadata?: array<string, string>, pricing: array{price_details?: array{price: string, pricing_overrides?: array{ends_at?: array{timestamp?: string, type: string}, lookup_key?: string, metadata?: array<string, string>, overwrite_price?: array{tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], unit_amount?: string}, priority?: int, starts_at?: array{timestamp?: string, type: string}, type: string}[], quantity_changes?: array{effective_at: array{timestamp?: string, type: string}, set: string}[]}, type: string}, starts_at: array{timestamp?: string, type: string}}, remove?: array{id: string}, type: string, update?: array{ends_at?: array{timestamp?: string, type: string}, id: string, pricing?: array{price_details?: array{pricing_override_actions?: array{add?: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, metadata?: array<string, string>, overwrite_price?: array{tiering_mode?: string, tiers?: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], unit_amount?: string}, priority?: int, starts_at: array{timestamp?: string, type: string}, type: string}, remove?: array{id?: string, lookup_key?: string}, type: string, update?: array{ends_at?: array{timestamp?: string, type: string}, id?: string, lookup_key?: string, metadata?: array<string, string>, starts_at?: array{timestamp?: string, type: string}}}[], quantity_changes?: array{effective_at: array{timestamp?: string, type: string}, set: string}[]}}, starts_at?: array{timestamp?: string, type: string}}}[], pricing_override_actions?: array{add?: array{ends_at: array{timestamp?: string, type: string}, lookup_key?: string, multiplier?: array{criteria: array{pricing_line_ids?: string[], pricing_line_lookup_keys?: string[], type: string}[], factor: string}, overwrite_price?: array{tiering_mode?: string, tiers: array{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}[], unit_amount?: string}, priority: int, starts_at: array{timestamp?: string, type: string}, type: string}, remove?: array{id: string}, type: string, update?: array{ends_at?: array{timestamp?: string, type: string}, id: string, starts_at?: array{timestamp?: string, type: string}}}[]} $params
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
                    'pricing_line_actions' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'add' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'pricing' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'price_details' => [
                                                    'kind' => 'object',
                                                    'fields' => [
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
                                                        'quantity_changes' => [
                                                            'kind' => 'array',
                                                            'element' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'set' => [
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
                                'update' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'pricing' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'price_details' => [
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
                                                        'quantity_changes' => [
                                                            'kind' => 'array',
                                                            'element' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'set' => [
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
                    'pricing_lines' => [
                        'kind' => 'object',
                        'fields' => [
                            'data' => [
                                'kind' => 'array',
                                'element' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'pricing' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'price_details' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'current_quantity' => [
                                                            'kind' => 'decimal_string',
                                                        ],
                                                        'pricing_overrides' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'data' => [
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
