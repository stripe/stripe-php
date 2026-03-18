<?php

// File generated from our OpenAPI spec

namespace Stripe\Reserve;

/**
 * ReservePlans are used to automatically place holds on a merchant's funds until the plan expires. It takes a portion of each incoming Charge (including those resulting from a Transfer from a platform account).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $created_by Indicates which party created this ReservePlan.
 * @property null|string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>. An unset currency indicates that the plan applies to all currencies.
 * @property null|int $disabled_at Time at which the ReservePlan was disabled.
 * @property null|(object{release_after: int, scheduled_release: int}&\Stripe\StripeObject) $fixed_release
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://docs.stripe.com/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property int $percent The percent of each Charge to reserve.
 * @property null|(object{days_after_charge: int, expires_on: null|int}&\Stripe\StripeObject) $rolling_release
 * @property string $status The current status of the ReservePlan. The ReservePlan only affects charges if it is <code>active</code>.
 * @property string $type The type of the ReservePlan.
 */
class Plan extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'reserve.plan';

    const CREATED_BY_APPLICATION = 'application';
    const CREATED_BY_STRIPE = 'stripe';

    const STATUS_ACTIVE = 'active';
    const STATUS_DISABLED = 'disabled';
    const STATUS_EXPIRED = 'expired';

    const TYPE_FIXED_RELEASE = 'fixed_release';
    const TYPE_ROLLING_RELEASE = 'rolling_release';
}
