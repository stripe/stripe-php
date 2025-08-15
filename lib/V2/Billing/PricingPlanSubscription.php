<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the PricingPlanSubscription.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $billing_cadence The ID of the Cadence this subscription is billed on.
 * @property string $collection_status Current collection status of this subscription.
 * @property (object{awaiting_customer_action_at: null|string, current_at: null|string, past_due_at: null|string, paused_at: null|string, unpaid_at: null|string}&\Stripe\StripeObject) $collection_status_transitions Timestamps for collection status transitions.
 * @property int $created Time at which the object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object.
 * @property string $pricing_plan The ID of the PricingPlan for this subscription.
 * @property string $pricing_plan_version The ID of the PricingPlanVersion for this subscription.
 * @property string $servicing_status Current servicing status of this subscription.
 * @property (object{activated_at: null|string, canceled_at: null|string, paused_at: null|string}&\Stripe\StripeObject) $servicing_status_transitions Timestamps for servicing status transitions.
 * @property null|string $test_clock The ID of the TestClock of the associated Cadence, if any.
 */
class PricingPlanSubscription extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.pricing_plan_subscription';

    const COLLECTION_STATUS_AWAITING_CUSTOMER_ACTION = 'awaiting_customer_action';
    const COLLECTION_STATUS_CURRENT = 'current';
    const COLLECTION_STATUS_PAST_DUE = 'past_due';
    const COLLECTION_STATUS_PAUSED = 'paused';
    const COLLECTION_STATUS_UNPAID = 'unpaid';

    const SERVICING_STATUS_ACTIVE = 'active';
    const SERVICING_STATUS_CANCELED = 'canceled';
    const SERVICING_STATUS_PAUSED = 'paused';
    const SERVICING_STATUS_PENDING = 'pending';
}
