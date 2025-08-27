<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $billing_cadence The ID of the Billing Cadence.
 * @property int $created Timestamp of when the object was created.
 * @property string $license_fee The ID of the License Fee.
 * @property string $license_fee_version The ID of the License Fee Version.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property int $quantity Quantity of the License Fee subscribed to.
 * @property null|string $test_clock The ID of the Test Clock, if any.
 */
class LicenseFeeSubscription extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.license_fee_subscription';
}
