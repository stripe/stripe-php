<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Data;

/**
 * Service factory class for API resources in the Data namespace.
 *
 * @property Reporting\ReportingServiceFactory $reporting
 */
class DataServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'reporting' => Reporting\ReportingServiceFactory::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
