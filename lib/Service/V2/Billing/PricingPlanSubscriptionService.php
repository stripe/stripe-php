<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Stripe\Util\RequestOptions
 */
class PricingPlanSubscriptionService extends \Stripe\Service\AbstractService
{
    /**
     * List all Pricing Plan Subscription objects.
     *
     * @param null|array{billing_cadence?: string, include?: string[], limit?: int, payer?: array{customer?: string, type: string}, pricing_plan?: string, pricing_plan_version?: string, servicing_status?: string} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Collection<\Stripe\V2\Billing\PricingPlanSubscription>
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v2/billing/pricing_plan_subscriptions', $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'data' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'pricing_plan_component_details' => [
                                    'kind' => 'array',
                                    'element' => [
                                        'kind' => 'object',
                                        'fields' => [
                                            'license_fee_details' => [
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
                                                    'transform_quantity' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'divide_by' => [
                                                                'kind' => 'int64_string',
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'recurring_credit_grant_details' => [
                                                'kind' => 'object',
                                                'fields' => [
                                                    'credit_grant_details' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'amount' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'custom_pricing_unit' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'value' => [
                                                                                'kind' => 'decimal_string',
                                                                            ],
                                                                        ],
                                                                    ],
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                    'credit_grant_per_tenant_details' => [
                                                        'kind' => 'object',
                                                        'fields' => [
                                                            'amount' => [
                                                                'kind' => 'object',
                                                                'fields' => [
                                                                    'custom_pricing_unit' => [
                                                                        'kind' => 'object',
                                                                        'fields' => [
                                                                            'value' => [
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
        ]);
    }

    /**
     * Remove Discounts from a Pricing Plan Subscription.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function removeDiscounts($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/pricing_plan_subscriptions/%s/remove_discounts', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'pricing_plan_component_details' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'license_fee_details' => [
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
                                        'transform_quantity' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'divide_by' => [
                                                    'kind' => 'int64_string',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'recurring_credit_grant_details' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'credit_grant_details' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'amount' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'custom_pricing_unit' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'value' => [
                                                                    'kind' => 'decimal_string',
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'credit_grant_per_tenant_details' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'amount' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'custom_pricing_unit' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'value' => [
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
     * Retrieve a Pricing Plan Subscription object.
     *
     * @param string $id
     * @param null|array{include?: string[]} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v2/billing/pricing_plan_subscriptions/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'pricing_plan_component_details' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'license_fee_details' => [
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
                                        'transform_quantity' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'divide_by' => [
                                                    'kind' => 'int64_string',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'recurring_credit_grant_details' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'credit_grant_details' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'amount' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'custom_pricing_unit' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'value' => [
                                                                    'kind' => 'decimal_string',
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'credit_grant_per_tenant_details' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'amount' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'custom_pricing_unit' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'value' => [
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
     * Update a Pricing Plan Subscription object.
     *
     * @param string $id
     * @param null|array{clear_cancel_at?: bool, metadata?: array<string, null|string>} $params
     * @param null|RequestOptionsArray|\Stripe\Util\RequestOptions $opts
     *
     * @return \Stripe\V2\Billing\PricingPlanSubscription
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v2/billing/pricing_plan_subscriptions/%s', $id), $params, $opts, [
            'response_schema' => [
                'kind' => 'object',
                'fields' => [
                    'pricing_plan_component_details' => [
                        'kind' => 'array',
                        'element' => [
                            'kind' => 'object',
                            'fields' => [
                                'license_fee_details' => [
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
                                        'transform_quantity' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'divide_by' => [
                                                    'kind' => 'int64_string',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                'recurring_credit_grant_details' => [
                                    'kind' => 'object',
                                    'fields' => [
                                        'credit_grant_details' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'amount' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'custom_pricing_unit' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'value' => [
                                                                    'kind' => 'decimal_string',
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                        'credit_grant_per_tenant_details' => [
                                            'kind' => 'object',
                                            'fields' => [
                                                'amount' => [
                                                    'kind' => 'object',
                                                    'fields' => [
                                                        'custom_pricing_unit' => [
                                                            'kind' => 'object',
                                                            'fields' => [
                                                                'value' => [
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
}
