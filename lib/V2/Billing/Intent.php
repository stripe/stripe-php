<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{currency: string, discount: string, shipping: string, subtotal: string, tax: string, total: string}&\Stripe\StripeObject) $amount_details Breakdown of the amount for this Billing Intent.
 * @property null|string $cadence ID of an existing Cadence to use.
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
