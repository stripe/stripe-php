<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * A FeeEntry is the atomic, append-only record of an assessed fee.
 *
 * @property string $id Unique identifier for the FeeEntry.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The fee amount.
 * @property (object{application?: (object{feature_name?: string}&\Stripe\StripeObject), network?: (object{feature_name?: string}&\Stripe\StripeObject), stripe?: (object{feature_name?: string}&\Stripe\StripeObject), type: string}&\Stripe\StripeObject) $charged_by The entity that assessed this fee.
 * @property int $created Timestamp of when this fee entry was created.
 * @property null|string $fee_batch The ID of the FeeBatch that collected this fee, if any.
 * @property (object{account?: string, id: string, occurred_at?: int, type: string}&\Stripe\StripeObject) $incurred_by The usage event that caused this fee to be assessed.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode, or <code>false</code> if in test mode.
 * @property string $reason The reason this fee entry was created.
 * @property null|(object{amount: \Stripe\StripeObject}&\Stripe\StripeObject) $tax The tax portion of the fee, if applicable.
 * @property string $type The category of this fee.
 */
class FeeEntry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.fee_entry';

    const REASON_OTHER = 'other';
    const REASON_PROCESSING_FEE = 'processing_fee';
    const REASON_REFUND = 'refund';
    const REASON_REFUND_FAILURE = 'refund_failure';
    const REASON_REPRICE = 'reprice';
    const REASON_TIER_TRUE_UP = 'tier_true_up';

    const TYPE_APPLICATION_FEE = 'application_fee';
    const TYPE_PASSTHROUGH_FEE = 'passthrough_fee';
    const TYPE_STRIPE_FEE = 'stripe_fee';
}
