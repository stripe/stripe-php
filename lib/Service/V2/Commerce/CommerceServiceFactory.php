<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Commerce;

/**
 * Service factory class for API resources in the Commerce namespace.
 *
 * @property ProductCatalog\ProductCatalogServiceFactory $productCatalog
 */
class CommerceServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'productCatalog' => ProductCatalog\ProductCatalogServiceFactory::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
