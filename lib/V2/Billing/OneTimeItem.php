<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A one-time item represents a product that can be charged as a one-time line item,
 * used for overage charges when custom pricing unit credits are exhausted.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Timestamp of when the object was created.
 * @property string $display_name Description that customers will see in the invoice line item. Maximum length of 250 characters.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular one-time item. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|(object{tax_code: string}&\Stripe\StripeObject) $tax_details Stripe Tax details.
 * @property null|string $unit_label The unit to use when displaying prices for this one-time item. For example, set this field to &quot;credit&quot; for the display to show &quot;(price) per credit&quot;. Maximum length of 100 characters.
 */
class OneTimeItem extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.one_time_item';
}
