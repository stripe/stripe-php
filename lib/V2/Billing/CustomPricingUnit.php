<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * The Custom Pricing Unit object.
 *
 * @property string $id The ID of the custom pricing unit.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $active Whether the CustomPricingUnit is active.
 * @property int $created Timestamp of when the object was created.
 * @property string $display_name Description that customers will see in the invoice line item. Maximum length of 250 characters.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular CustomPricingUnit item. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 */
class CustomPricingUnit extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.custom_pricing_unit';
}
