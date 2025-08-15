<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the BillingIntent.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{currency: string, discount: string, shipping: string, subtotal: string, tax: string, total: string}&\Stripe\StripeObject) $amount_details Breakdown of the amount for this BillingIntent.
 * @property null|string $cadence ID of an existing Cadence to use.
 * @property int $created Time at which the object was created.
 * @property string $currency Three-letter ISO currency code, in lowercase.
 * @property string $effective_at When the BillingIntent will take effect.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Current status of the BillingIntent.
 * @property (object{canceled_at: null|int, committed_at: null|int, drafted_at: null|int, reserved_at: null|int}&\Stripe\StripeObject) $status_transitions Timestamps for status transitions of the BillingIntent.
 */
class Intent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.intent';

    const EFFECTIVE_AT_CURRENT_BILLING_PERIOD_START = 'current_billing_period_start';
    const EFFECTIVE_AT_ON_COMMIT = 'on_commit';
    const EFFECTIVE_AT_ON_RESERVE = 'on_reserve';

    const STATUS_CANCELED = 'canceled';
    const STATUS_COMMITTED = 'committed';
    const STATUS_DRAFT = 'draft';
    const STATUS_RESERVED = 'reserved';
}
