<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A billing meter event adjustment represents the status of a meter event adjustment.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The meter event adjustment's status.
 */
class MeterEventAdjustment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.meter_event_adjustment';

    use \Stripe\ApiOperations\Create;

    const STATUS_COMPLETE = 'complete';
    const STATUS_PENDING = 'pending';
}
