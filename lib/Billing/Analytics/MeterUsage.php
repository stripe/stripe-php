<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing\Analytics;

/**
 * A billing meter usage event represents an aggregated view of a customer’s billing meter events within a specified timeframe.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property int $refreshed_at The timestamp to indicate data freshness, measured in seconds since the Unix epoch.
 * @property \Stripe\Collection<MeterUsageRow> $rows
 */
class MeterUsage extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'billing.analytics.meter_usage';

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
