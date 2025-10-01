<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the object was created.
 * @property null|(object{id: string, version?: string}&\Stripe\StripeObject) $license_fee Details if this component is a License Fee.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular PricingPlanComponent.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $pricing_plan The ID of the Pricing Plan this component belongs to.
 * @property string $pricing_plan_version The ID of the Pricing Plan Version this component belongs to.
 * @property null|(object{id: string, version?: string}&\Stripe\StripeObject) $rate_card Details if this component is a Rate Card.
 * @property null|(object{id: string}&\Stripe\StripeObject) $service_action Details if this component is a Service Action.
 * @property string $type The type of the PricingPlanComponent.
 */
class PricingPlanComponent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.pricing_plan_component';

    const TYPE_LICENSE_FEE = 'license_fee';
    const TYPE_RATE_CARD = 'rate_card';
    const TYPE_SERVICE_ACTION = 'service_action';
}
