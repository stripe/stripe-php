<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A billing meter event summary represents an aggregated view of a customer's billing meter events within a specified timeframe. It indicates how much
 * usage was accrued by a customer for that period.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property float $aggregated_value Aggregated value of all the events within start_time (inclusive) and end_time (inclusive). The aggregation strategy is defined on meter via `default_aggregation``.
 * @property int $end_time End timestamp for this usage summary (inclusive).
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $meter The meter associated with this usage summary.
 * @property int $start_time Start timestamp for this usage summary (inclusive).
 */
class MeterEventSummary extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.meter_event_summary';
}
