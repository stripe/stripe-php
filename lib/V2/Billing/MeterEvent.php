<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Billing;

/**
 * Fix me empty_doc_string.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created The creation time of this meter event.
 * @property string $event_name The name of the meter event. Corresponds with the <code>event_name</code> field on a meter.
 * @property string $identifier A unique identifier for the event. If not provided, one will be generated. We recommend using a globally unique identifier for this. We’ll enforce uniqueness within a rolling 24 hour period.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $payload The payload of the event. This must contain the fields corresponding to a meter’s <code>customer_mapping.event_payload_key</code> (default is <code>stripe_customer_id</code>) and <code>value_settings.event_payload_key</code> (default is <code>value</code>). Read more about the payload.
 * @property int $timestamp The time of the event. Must be within the past 35 calendar days or up to 5 minutes in the future. Defaults to current timestamp if not specified.
 */
class MeterEvent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.billing.meter_event';
}
