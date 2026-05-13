<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * A FeeBatch represents a settlement grouping of fees.
 * It bridges the fee domain with actual money movement, tracking what was settled and how.
 *
 * @property string $id Unique identifier for the FeeBatch.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{tax_adjustment?: \Stripe\StripeObject}&\Stripe\StripeObject) $adjustments Adjustments applied to this batch.
 * @property \Stripe\StripeObject $amount The total fee amount billed in this batch.
 * @property (object{type: string}&\Stripe\StripeObject) $collected_by The entity that collected this batch.
 * @property (object{amount: \Stripe\StripeObject, balance_transaction?: string, credit_transaction?: string, money_management_transaction?: string, payable_invoice?: string, tax?: (object{amount: \Stripe\StripeObject}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject)[] $collection_records The money movement records associated with collecting this batch.
 * @property int $created Timestamp of when this batch was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode, or <code>false</code> if in test mode.
 * @property string $status The current state of this batch.
 * @property (object{billed_at?: int}&\Stripe\StripeObject) $status_transitions Timestamps for each status transition.
 * @property null|(object{amount: \Stripe\StripeObject}&\Stripe\StripeObject) $tax The tax amount included in this batch.
 */
class FeeBatch extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.fee_batch';

    const STATUS_BILLED = 'billed';
    const STATUS_PENDING = 'pending';
}
