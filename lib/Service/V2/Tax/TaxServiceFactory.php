<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Tax;

/**
 * Service factory class for API resources in the Tax namespace.
 *
 * @property AutomaticRuleService $automaticRules
 */
class TaxServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'automaticRules' => AutomaticRuleService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
