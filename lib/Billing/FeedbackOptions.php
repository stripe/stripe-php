<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A resource for the feedback options model (for custom cancellation reasons).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string $status The feedback option's status.
 * @property (object{deactivated_at: null|int}&\Stripe\StripeObject) $status_transitions
 */
class FeedbackOptions extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.feedback_options';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
}
