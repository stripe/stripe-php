<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Privacy;

/**
 * Service factory class for API resources in the Privacy namespace.
 *
 * @property RedactionJobService $redactionJobs
 */
class PrivacyServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'redactionJobs' => RedactionJobService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
