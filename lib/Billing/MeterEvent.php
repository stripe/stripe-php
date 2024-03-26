<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A billing meter event represents a customer's usage of a product. Meter events are used to bill a customer based on their usage.
 * Meter events are associated with billing meters, which define the shape of the event's payload and how those events are aggregated for billing.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $event_name The name of the meter event. Corresponds with the <code>event_name</code> field on a meter.
 * @property string $identifier A unique identifier for the event.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $payload The payload of the event.
 * @property int $timestamp The timestamp passed in when creating the event. Measured in seconds since the Unix epoch.
 */
class MeterEvent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.meter_event';

    use \Stripe\ApiOperations\Create;
}
