<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $billing_cadence The ID of the Billing Cadence this subscription is billed on.
 * @property string $collection_status Current collection status of this subscription.
 * @property (object{awaiting_customer_action_at?: string, current_at?: string, past_due_at?: string, paused_at?: string, unpaid_at?: string}&\Stripe\StripeObject) $collection_status_transitions Timestamps for collection status transitions.
 * @property int $created Time at which the object was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $pricing_plan The ID of the Pricing Plan for this subscription.
 * @property string $pricing_plan_version The ID of the Pricing Plan Version for this subscription.
 * @property string $servicing_status Current servicing status of this subscription.
 * @property (object{activated_at?: string, canceled_at?: string, paused_at?: string, will_activate_at?: string, will_cancel_at?: string}&\Stripe\StripeObject) $servicing_status_transitions Timestamps for servicing status transitions.
 * @property null|string $test_clock The ID of the Test Clock of the associated Billing Cadence, if any.
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
