<?php

// File generated from our OpenAPI spec

namespace Stripe\Reserve;

/**
 * ReserveReleases represent the release of funds from a ReserveHold.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount released. A positive integer representing how much is released in the <a href="https://docs.stripe.com/currencies#zero-decimal">smallest currency unit</a>.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $created_by Indicates which party created this ReserveRelease.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $reason The reason for the ReserveRelease, indicating why the funds were released.
 * @property int $released_at The release timestamp of the funds.
 * @property null|Hold|string $reserve_hold The ReserveHold this ReserveRelease is associated with.
 * @property null|Plan|string $reserve_plan The ReservePlan ID this ReserveRelease is associated with. This field is only populated if a ReserveRelease is created by a ReservePlan disable operation, or from a scheduled ReservedHold expiry.
 * @property null|(object{dispute?: string|\Stripe\Dispute, refund?: string|\Stripe\Refund, type: string}&\Stripe\StripeObject) $source_transaction
 */
class Release extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'reserve.release';

    const CREATED_BY_APPLICATION = 'application';
    const CREATED_BY_STRIPE = 'stripe';

    const REASON_BULK_HOLD_EXPIRY = 'bulk_hold_expiry';
    const REASON_HOLD_RELEASED_EARLY = 'hold_released_early';
    const REASON_HOLD_REVERSED = 'hold_reversed';
    const REASON_PLAN_DISABLED = 'plan_disabled';
}
