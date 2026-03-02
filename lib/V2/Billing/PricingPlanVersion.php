<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * A Pricing Plan Version represents a specific configuration of a Pricing Plan at a point in time. Versions are created
 * automatically when you update a Pricing Plan, allowing you to track changes and manage which version is active for new
 * subscriptions. Each version has a start date and optionally an end date if it has been superseded.
 *
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
