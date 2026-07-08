<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * Contract resource representing a comprehensive sales agreement.
 *
 * @property string $id The contract id.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{timestamp: int}&\Stripe\StripeObject) $billing_cycle_anchor The billing cycle anchor.
 * @property null|(object{bill_settings_details?: (object{calculation?: (object{tax?: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), invoice?: (object{time_until_due?: (object{interval: string, interval_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), billing_profile_details: (object{customer: string, default_payment_method?: string}&\Stripe\StripeObject), collection_settings_details: (object{collection_method: string, payment_method_configuration?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $billing_settings The billing settings.
 * @property string $contract_number A unique user-provided contract number e.g. C-2026-0001.
 * @property int $created Timestamp of when the contract was created.
 * @property string $currency The currency.
 * @property string $customer The customer id.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs.
 * @property null|(object{data: (object{ends_at: (object{timestamp: int}&\Stripe\StripeObject), id: string, lookup_key?: string, metadata?: \Stripe\StripeObject, pricing: (object{price_details?: (object{current_quantity: string, price: string, pricing_overrides?: (object{data: (object{ends_at: (object{timestamp: int}&\Stripe\StripeObject), id: string, lookup_key?: string, overwrite_price?: (object{unit_amount?: string}&\Stripe\StripeObject), priority: int, starts_at: (object{timestamp: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), starts_at: (object{timestamp: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $pricing_lines The pricing lines. Only populated when <code>pricing_lines</code> is passed in the <code>include</code> parameter.
 * @property null|(object{data: (object{ends_at: (object{timestamp: int}&\Stripe\StripeObject), id: string, lookup_key?: string, multiply_pricing?: (object{criteria: (object{pricing_line_ids?: string[], pricing_line_lookup_keys?: string[], type: string}&\Stripe\StripeObject)[], factor: string}&\Stripe\StripeObject), priority: int, starts_at: (object{timestamp: int}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[]}&\Stripe\StripeObject) $pricing_overrides The pricing overrides. Only populated when <code>pricing_overrides</code> is passed in the <code>include</code> parameter.
 * @property string $status The current status of the contract.
 * @property null|(object{activated_at?: int, canceled_at?: int, ended_at?: int}&\Stripe\StripeObject) $status_transitions Historical timestamps of when the contract transitioned into each status.
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
