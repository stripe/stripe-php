<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing\Analytics;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|\Stripe\StripeObject $dimensions A set of key-value pairs representing the dimensions of the meter usage.
 * @property int $ends_at Timestamp indicating the end of the bucket. Measured in seconds since the Unix epoch.
 * @property null|string $meter The unique identifier for the meter. Null if no meters were provided and usage was aggregated across all meters.
 * @property int $starts_at Timestamp indicating the start of the bucket. Measured in seconds since the Unix epoch.
 * @property null|\Stripe\StripeObject $tenants A set of key-value pairs representing the tenants of the meter usage.
 * @property float $value The aggregated meter usage value for the specified bucket.
 */
class MeterUsageRow extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.analytics.meter_usage_row';
}
