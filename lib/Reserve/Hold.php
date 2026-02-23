<?php

// File generated from our OpenAPI spec

namespace Stripe\Reserve;

/**
 * ReserveHolds are used to place a temporary ReserveHold on a merchant's funds.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount reserved. A positive integer representing how much is reserved in the <a href="https://docs.stripe.com/currencies#zero-decimal">smallest currency unit</a>.
 * @property null|int $amount_releasable Amount in cents that can be released from this ReserveHold
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $created_by Indicates which party created this ReserveHold.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property null|bool $is_releasable Whether there are any funds available to release on this ReserveHold. Note that if the ReserveHold is in the process of being released, this could be false, even though the funds haven't been fully released yet.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $reason The reason for the ReserveHold.
 * @property (object{release_after: null|int, scheduled_release: null|int}&\Stripe\StripeObject) $release_schedule
 * @property null|Plan|string $reserve_plan The ReservePlan which produced this ReserveHold (i.e., resplan_123)
 * @property null|string|\Stripe\Charge $source_charge The Charge which funded this ReserveHold (e.g., ch_123)
 * @property string $source_type Which source balance type this ReserveHold reserves funds from. One of <code>bank_account</code>, <code>card</code>, or <code>fpx</code>.
 */
class Hold extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'reserve.hold';

    const CREATED_BY_APPLICATION = 'application';
    const CREATED_BY_STRIPE = 'stripe';

    const REASON_CHARGE = 'charge';
    const REASON_STANDALONE = 'standalone';

    const SOURCE_TYPE_BANK_ACCOUNT = 'bank_account';
    const SOURCE_TYPE_CARD = 'card';
    const SOURCE_TYPE_FPX = 'fpx';
}
