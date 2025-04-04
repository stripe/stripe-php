<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * @property string $id The unique id of this meter event adjustment.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{identifier: string}&\Stripe\StripeObject) $cancel Specifies which event to cancel.
 * @property int $created The time the adjustment was created.
 * @property string $event_name The name of the meter event. Corresponds with the <code>event_name</code> field on a meter.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Open Enum. The meter event adjustment’s status.
 * @property string $type Open Enum. Specifies whether to cancel a single event or a range of events for a time period. Time period cancellation is not supported yet.
 */
class MeterEventAdjustment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.meter_event_adjustment';

    const STATUS_COMPLETE = 'complete';
    const STATUS_PENDING = 'pending';
}
