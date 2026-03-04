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
 * @property (object{currency: string, discount: string, shipping: string, subtotal: string, tax: string, total: string}&\Stripe\StripeObject) $amount_details Breakdown of the amount for this Billing Intent.
 * @property null|string $cadence ID of an existing Cadence to use.
 * @property null|(object{billing_cycle: (object{interval_count: int, type: string, day?: (object{time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), month?: (object{day_of_month: int, month_of_year?: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), week?: (object{day_of_week: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject), year?: (object{day_of_month: int, month_of_year: int, time: (object{hour: int, minute: int, second?: int}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject), payer: (object{billing_profile?: string, billing_profile_data?: (object{customer: string, default_payment_method?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject), settings?: (object{bill?: (object{id: string, version?: string}&\Stripe\StripeObject), collection?: (object{id: string, version?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $cadence_data Data for creating a new Cadence.
 * @property int $created Time at which the object was created.
 * @property string $currency Three-letter ISO currency code, in lowercase. Must be a supported currency.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Current status of the Billing Intent.
 * @property (object{canceled_at?: int, committed_at?: int, drafted_at?: int, reserved_at?: int}&\Stripe\StripeObject) $status_transitions Timestamps for status transitions of the Billing Intent.
 */
class Intent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.intent';

    const STATUS_CANCELED = 'canceled';
    const STATUS_COMMITTED = 'committed';
    const STATUS_DRAFT = 'draft';
    const STATUS_RESERVED = 'reserved';
}
