<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Reserve;

/**
 * Service factory class for API resources in the Reserve namespace.
 *
 * @property HoldService $holds
 * @property PlanService $plans
 * @property ReleaseService $releases
 */
class ReserveServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'holds' => HoldService::class,
        'plans' => PlanService::class,
        'releases' => ReleaseService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
