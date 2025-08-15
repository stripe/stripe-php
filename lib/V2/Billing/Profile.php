<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id The ID of the billing profile object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property null|string $customer The ID of the customer object.
 * @property null|string $default_payment_method The ID of the payment method object.
 * @property null|string $display_name A customer-facing name for the billing profile. Maximum length of 250 characters.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular billing profile. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $status The current status of the billing profile.
 */
class Profile extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.profile';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
