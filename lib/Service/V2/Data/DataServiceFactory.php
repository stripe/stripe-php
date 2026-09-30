<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data;

/**
 * Service factory class for API resources in the Data namespace.
 *
 * @property Analytics\AnalyticsServiceFactory $analytics
 * @property QueryRunService $queryRuns
 * @property Reporting\ReportingServiceFactory $reporting
 * @property ReportRunService $reportRuns
 * @property ReportService $reports
 * @property SchemaService $schemas
 */
class DataServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'analytics' => Analytics\AnalyticsServiceFactory::class,
        'queryRuns' => QueryRunService::class,
        'reporting' => Reporting\ReportingServiceFactory::class,
        'reportRuns' => ReportRunService::class,
        'reports' => ReportService::class,
        'schemas' => SchemaService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
