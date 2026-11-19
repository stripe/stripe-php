<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Billing Group combines member invoices into a consolidated invoice according to shared grouping behavior.
 *
 * @property string $id The ID of the BillingGroup object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{collection_method: string, email_delivery: (object{payment_due: (object{enabled: bool, include_payment_link: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject), invoice_presentation?: (object{invoice_rendering_template?: string}&\Stripe\StripeObject), invoice_time_until_due: (object{interval: string, interval_count: int}&\Stripe\StripeObject), payment_method_configuration?: string, payment_method_options?: (object{acss_debit?: (object{mandate_options?: (object{transaction_type?: string}&\Stripe\StripeObject), verification_method?: string}&\Stripe\StripeObject), bancontact?: (object{preferred_language?: string}&\Stripe\StripeObject), card?: (object{mandate_options?: (object{amount?: int, amount_type?: string, description?: string}&\Stripe\StripeObject), network?: string, request_three_d_secure?: string}&\Stripe\StripeObject), customer_balance?: (object{bank_transfer?: (object{eu_bank_transfer?: (object{country: string}&\Stripe\StripeObject), type?: string}&\Stripe\StripeObject), funding_type?: string}&\Stripe\StripeObject), konbini?: (object{}&\Stripe\StripeObject), sepa_debit?: (object{}&\Stripe\StripeObject), us_bank_account?: (object{financial_connections: (object{filters?: (object{account_subcategories: string[]}&\Stripe\StripeObject), permissions: string[], prefetch: string[]}&\Stripe\StripeObject), verification_method: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), tax: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $billing_settings The effective billing settings for the group. Returned only when <code>billing_settings</code> is included in the request.
 * @property string $created Timestamp of when the object was created.
 * @property string $customer The ID of the Customer object whose invoices are grouped.
 * @property null|string $default_payment_method The ID of the PaymentMethod object used by default. If unset, the customer's default payment method is used.
 * @property (object{by_cadence?: (object{billing_cycle_anchor?: string, day?: (object{time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), interval_count: int, month?: (object{day_of_month?: int, month_of_year?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string, week?: (object{day_of_week?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), year?: (object{day_of_month?: int, month_of_year?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $grouping_behavior The strategy used to group member invoices.
 * @property null|(object{id: string, percent_off?: (object{maximum_applications: (object{times?: int, type: string}&\Stripe\StripeObject), percent_off: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[] $invoice_discount_rules The discount rules applied to all invoices for the group's underlying cadence. Returned only when <code>invoice_discount_rules</code> is included in the request.
 * @property bool $livemode Whether the billing group exists in live mode.
 * @property null|string $lookup_key An internal key you can use to find a particular billing group. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object for storing additional structured information.
 * @property string $next_billing_date The date when the billing group will next create a consolidated invoice.
 * @property string $status The current status of the billing group.
 * @property (object{activated_at?: string, canceled_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps for the billing group's status transitions.
 * @property null|string $test_clock The ID of the TestClock object associated with the billing group.
 */
class Group extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.group';

    public static function fieldEncodings()
    {
        return [
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
                                'percent_off' => ['kind' => 'decimal_string'],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
}
