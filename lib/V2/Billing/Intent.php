<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Billing Intent represents a proposed change to a customer's billing configuration, such as subscribing to a new service,
 * modifying an existing subscription, or canceling service. Intents follow a draft-reserve-commit workflow where they can be
 * previewed before committing, allowing you to see the billing impact before changes take effect.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{amount_due: string, currency: string, customer_balance_applied: string, discount: string, shipping: string, subtotal: string, tax: string, total: string}&\Stripe\StripeObject) $amount_details Breakdown of the amount for this Billing Intent.
 * @property null|string $billing_group ID of an existing Billing Group to use.
 * @property null|(object{billing_settings?: (object{collection_method: string, email_delivery: (object{payment_due: (object{enabled: bool, include_payment_link: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject), invoice_presentation?: (object{invoice_rendering_template?: string}&\Stripe\StripeObject), invoice_time_until_due: (object{interval: string, interval_count: int}&\Stripe\StripeObject), payment_method_configuration?: string, payment_method_options?: (object{acss_debit?: (object{mandate_options?: (object{transaction_type?: string}&\Stripe\StripeObject), verification_method?: string}&\Stripe\StripeObject), bancontact?: (object{preferred_language?: string}&\Stripe\StripeObject), card?: (object{mandate_options?: (object{amount?: int, amount_type?: string, description?: string}&\Stripe\StripeObject), network?: string, request_three_d_secure?: string}&\Stripe\StripeObject), customer_balance?: (object{bank_transfer?: (object{eu_bank_transfer?: (object{country: string}&\Stripe\StripeObject), type?: string}&\Stripe\StripeObject), funding_type?: string}&\Stripe\StripeObject), konbini?: (object{}&\Stripe\StripeObject), sepa_debit?: (object{}&\Stripe\StripeObject), us_bank_account?: (object{financial_connections: (object{filters?: (object{account_subcategories: string[]}&\Stripe\StripeObject), permissions: string[], prefetch: string[]}&\Stripe\StripeObject), verification_method: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), tax: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), customer: string, default_payment_method?: string, grouping_behavior?: (object{by_cadence?: (object{billing_cycle_anchor?: string, day?: (object{time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), interval_count: int, month?: (object{day_of_month?: int, month_of_year?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string, week?: (object{day_of_week?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), year?: (object{day_of_month?: int, month_of_year?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject), lookup_key?: string}&\Stripe\StripeObject) $billing_group_data Data for creating a new Billing Group.
 * @property string $created Time at which the object was created.
 * @property string $currency Three-letter ISO currency code, in lowercase. Must be a supported currency.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Current status of the Billing Intent.
 * @property (object{canceled_at?: string, committed_at?: string, drafted_at?: string, expires_at: string, reserved_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps for status transitions of the Billing Intent.
 */
class Intent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.intent';

    public static function fieldEncodings()
    {
        return [
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
        ];
    }

    const STATUS_CANCELED = 'canceled';
    const STATUS_COMMITTED = 'committed';
    const STATUS_DRAFT = 'draft';
    const STATUS_RESERVED = 'reserved';
}
