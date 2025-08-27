<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property bool $active Whether the PricingPlan is active.
 * @property int $created Time at which the object was created.
 * @property string $currency The currency of the PricingPlan.
 * @property null|string $description A description for pricing plan subscription. Maximum length of 500 characters.
 * @property string $display_name Display name of the PricingPlan.
 * @property string $latest_version The ID of the latest version of the PricingPlan.
 * @property null|string $live_version The ID of the live version of the PricingPlan.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular PricingPlan. Maximum length of 200 characters.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $tax_behavior The Stripe Tax tax behavior - whether the PricingPlan is inclusive or exclusive of tax.
 */
class PricingPlan extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.pricing_plan';

    const TAX_BEHAVIOR_EXCLUSIVE = 'exclusive';
    const TAX_BEHAVIOR_INCLUSIVE = 'inclusive';
}
