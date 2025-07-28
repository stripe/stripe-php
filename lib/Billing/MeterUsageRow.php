<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $bucket_end_time Timestamp indicating the end of the bucket. Measured in seconds since the Unix epoch.
 * @property int $bucket_start_time Timestamp indicating the start of the bucket. Measured in seconds since the Unix epoch.
 * @property float $bucket_value The aggregated meter usage value for the specified bucket.
 * @property null|\Stripe\StripeObject $dimensions A set of key-value pairs representing the dimensions of the meter usage.
 * @property null|string $meter_id The unique identifier for the meter.
 */
class MeterUsageRow extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.meter_usage_row';
}
