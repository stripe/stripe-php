<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data\Analytics;

/**
 * Service factory class for API resources in the Analytics namespace.
 *
 * @property MetricQueryService $metricQuery
 */
class AnalyticsServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'metricQuery' => MetricQueryService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
