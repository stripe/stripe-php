<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Climate;

/**
 * Service factory class for API resources in the Climate namespace.
 *
 * @property OrderService $orders
 * @property ProductService $products
 * @property SupplierService $suppliers
 */
class ClimateServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'orders' => OrderService::class,
        'products' => ProductService::class,
        'suppliers' => SupplierService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
