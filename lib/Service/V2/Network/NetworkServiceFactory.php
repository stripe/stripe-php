<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Network;

/**
 * Service factory class for API resources in the Network namespace.
 *
 * @property BusinessProfileService $businessProfiles
 */
class NetworkServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'businessProfiles' => BusinessProfileService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
