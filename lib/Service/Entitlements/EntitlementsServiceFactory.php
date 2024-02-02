<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Entitlements;

/**
 * Service factory class for API resources in the Entitlements namespace.
 *
 * @property EventService $events
 * @property FeatureService $features
 */
class EntitlementsServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'events' => EventService::class,
        'features' => FeatureService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
