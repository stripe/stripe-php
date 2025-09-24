<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{interval_count: int, type: string, day?: (object{time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), month?: (object{day_of_month: int, month_of_year?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), week?: (object{day_of_week: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), year?: (object{day_of_month: int, month_of_year: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $billing_cycle The billing cycle is the object that defines future billing cycle dates.
 * @property int $created Timestamp of when the object was created.
 * @property null|(object{id: string, type: string, percent_off?: (object{maximum_applications: (object{type: string}&\Stripe\StripeObject), percent_off: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[] $invoice_discount_rules The discount rules applied to all invoices for the cadence.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key A lookup key used to retrieve cadences dynamically from a static string. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|int $next_billing_date The date that the billing cadence will next bill. Null if the cadence is not active.
 * @property (object{billing_profile: string, customer?: string, type: string}&\Stripe\StripeObject) $payer The payer determines the entity financially responsible for the bill.
 * @property null|(object{bill?: (object{id: string, version?: string}&\Stripe\StripeObject), collection?: (object{id: string, version?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $settings The settings associated with the cadence.
 * @property null|(object{bill: (object{calculation: (object{tax?: (object{type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), invoice: (object{time_until_due?: (object{interval: string, interval_count: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), invoice_rendering_template?: string}&\Stripe\StripeObject), collection: (object{collection_method: string, email_delivery: (object{payment_due?: (object{enabled: bool, include_payment_link: bool}&\Stripe\StripeObject)}&\Stripe\StripeObject), payment_method_configuration: string, payment_method_options: (object{acss_debit?: (object{mandate_options?: (object{transaction_type?: string}&\Stripe\StripeObject), verification_method?: string}&\Stripe\StripeObject), bancontact?: (object{preferred_language?: string}&\Stripe\StripeObject), card?: (object{mandate_options?: (object{amount?: int, amount_type?: string, description?: string}&\Stripe\StripeObject), network?: string, request_three_d_secure?: string}&\Stripe\StripeObject), customer_balance?: (object{bank_transfer?: (object{eu_bank_transfer?: (object{country: string}&\Stripe\StripeObject), type?: string}&\Stripe\StripeObject), funding_type?: string}&\Stripe\StripeObject), konbini?: \Stripe\StripeObject, sepa_debit?: \Stripe\StripeObject, us_bank_account?: (object{financial_connections: (object{filters?: (object{account_subcategories: string[]}&\Stripe\StripeObject), permissions: string[], prefetch: string[]}&\Stripe\StripeObject), verification_method: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $settings_data Settings data that contains expanded billing settings configuration with actual values.
 * @property string $status The current status of the cadence.
 * @property null|string $test_clock The ID of the Test Clock.
 */
class Cadence extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.cadence';

    const STATUS_ACTIVE = 'active';
    const STATUS_CANCELED = 'canceled';
}
