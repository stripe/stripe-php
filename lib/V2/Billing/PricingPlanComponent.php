<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the PricingPlanComponent.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the object was created.
 * @property null|(object{id: string, version: string}&\Stripe\StripeObject) $license_fee Details if this component is a LicenseFee.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $lookup_key An internal key you can use to search for a particular PricingPlanComponent.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object.
 * @property string $pricing_plan The ID of the PricingPlan this component belongs to.
 * @property string $pricing_plan_version The ID of the PricingPlanVersion this component belongs to.
 * @property null|(object{id: string, version: string}&\Stripe\StripeObject) $rate_card Details if this component is a RateCard.
 * @property null|(object{id: string, version: string}&\Stripe\StripeObject) $service_action Details if this component is a ServiceAction.
 * @property string $type The type of the PricingPlanComponent.
 */
class PricingPlanComponent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.pricing_plan_component';

    const TYPE_LICENSE_FEE = 'license_fee';
    const TYPE_RATE_CARD = 'rate_card';
    const TYPE_SERVICE_ACTION = 'service_action';
}
