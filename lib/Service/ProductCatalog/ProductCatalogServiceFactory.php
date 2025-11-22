<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\ProductCatalog;

/**
 * Service factory class for API resources in the ProductCatalog namespace.
 *
 * @property TrialOfferService $trialOffers
 */
class ProductCatalogServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'trialOffers' => TrialOfferService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
