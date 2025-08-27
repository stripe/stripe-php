<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the object was created.
 * @property null|int $end_date The timestamp when this version became inactive. Null if it's the latest version.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $pricing_plan The ID of the PricingPlan this version belongs to.
 * @property int $start_date The timestamp when this version became active.
 */
class PricingPlanVersion extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.pricing_plan_version';
}
