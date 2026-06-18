<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Contracts\PricingLines;

/**
 * Service factory class for API resources in the PricingLines namespace.
 *
 * @property QuantityChangeService $quantityChanges
 */
class PricingLinesServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'quantityChanges' => QuantityChangeService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
