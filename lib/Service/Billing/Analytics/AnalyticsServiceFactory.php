<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Billing\Analytics;

/**
 * Service factory class for API resources in the Analytics namespace.
 *
 * @property MeterUsageService $meterUsage
 */
class AnalyticsServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'meterUsage' => MeterUsageService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
