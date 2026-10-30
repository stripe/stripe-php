<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Risk;

/**
 * Service factory class for API resources in the Risk namespace.
 *
 * @property FormService $forms
 */
class RiskServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'forms' => FormService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
