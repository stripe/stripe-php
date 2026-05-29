<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing\Contracts;

/**
 * Service factory class for API resources in the Contracts namespace.
 *
 * @property LicensePricing\LicensePricingServiceFactory $licensePricing
 */
class ContractsServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'licensePricing' => LicensePricing\LicensePricingServiceFactory::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
