<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject $reason
 * @property null|\Stripe\StripeObject $related_object The related objects about the error
 * @property string $summary Summary of invalid events
 * @property int $validation_end Time when validation ended. Measured in seconds since the Unix epoch
 * @property int $validation_start Time when validation started. Measured in seconds since the Unix epoch
 */
class MeterErrorReport extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.meter_error_report';
}
