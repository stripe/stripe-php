<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Provisioning\Catalog;

/**
 * Service factory class for API resources in the Catalog namespace.
 *
 * @property ProviderService $providers
 * @property ServiceService $services
 */
class CatalogServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'providers' => ProviderService::class,
        'services' => ServiceService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
