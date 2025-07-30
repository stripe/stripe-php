<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A billing meter usage event represents an aggregated view of a customer’s billing meter events within a specified timeframe.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property MeterUsageRow[] $data The aggregated meter usage data for the specified customer and time range.
 * @property int $data_refreshed_at Timestamp indicating how fresh the data is. Measured in seconds since the Unix epoch.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class MeterUsage extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'billing.meter_usage';

    /**
     * Returns aggregated meter usage data for a customer within a specified time
     * interval. The data can be grouped by various dimensions and can include multiple
     * meters if specified.
     *
     * @param null|array|string $opts
     *
     * @return MeterUsage
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
