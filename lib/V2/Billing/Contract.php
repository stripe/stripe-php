<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * Main Contract resource representing a comprehensive billing agreement.
 *
 * @property string $id The ID of the contract object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{timestamp: int}&\Stripe\StripeObject) $billing_cycle_anchor The billing cycle anchor for the contract.
 * @property null|(object{bill_settings_details?: (object{calculation?: (object{tax?: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), invoice?: (object{time_until_due?: (object{interval: string, interval_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), billing_profile_details: (object{customer: string, default_payment_method?: string}&\Stripe\StripeObject), collection_settings_details: (object{collection_method: string, payment_method_configuration?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $billing_settings The billing settings for the contract.
 * @property string $contract_number A unique user-provided contract number e.g. C-2026-0001.
 * @property int $created Timestamp of when the object was created.
 * @property string $currency The currency of the contract.
 * @property string $customer The ID of the customer associated with the contract.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object.
 * @property null|(object{data: (object{amount: \Stripe\StripeObject, bill_at: (object{timestamp: int}&\Stripe\StripeObject), id: string, lookup_key?: string, product: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $one_time_fees The one-time fees of the contract. Only populated when <code>one_time_fees</code> is passed in the <code>include</code> parameter.
 * @property null|(object{data: (object{ends_at: (object{timestamp: int}&\Stripe\StripeObject), id: string, lookup_key?: string, metadata?: \Stripe\StripeObject, pricing: (object{price_details?: (object{current_quantity: string, price: string, pricing_overrides?: (object{data: (object{ends_at: (object{timestamp: int}&\Stripe\StripeObject), lookup_key?: string, overwrite_price?: (object{tiering_mode?: string, tiers: (object{flat_amount?: string, unit_amount?: string, up_to_decimal?: string, up_to_inf?: string}&\Stripe\StripeObject)[], unit_amount?: string}&\Stripe\StripeObject), pricing_override: string, starts_at: (object{timestamp: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), starts_at: (object{timestamp: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $pricing_lines The pricing lines of the contract. Only populated when <code>pricing_lines</code> is passed in the <code>include</code> parameter.
 * @property null|(object{data: (object{ends_at: (object{timestamp: int}&\Stripe\StripeObject), id: string, lookup_key?: string, multiplier?: (object{criteria: (object{pricing_line_ids?: string[], pricing_line_lookup_keys?: string[], type: string}&\Stripe\StripeObject)[], factor: string}&\Stripe\StripeObject), priority: int, starts_at: (object{timestamp: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $pricing_overrides The pricing overrides of the contract. Only populated when <code>pricing_overrides</code> is passed in the <code>include</code> parameter.
 * @property string $status The current status of the contract.
 * @property (object{active?: (object{activated_at: int}&\Stripe\StripeObject), canceled?: (object{canceled_at: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Information about the contract status transitions.
 */
class Contract extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.contract';

    public static function fieldEncodings()
    {
        return [
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
        ];
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
    const STATUS_DRAFT = 'draft';
    const STATUS_ENDED = 'ended';
}
