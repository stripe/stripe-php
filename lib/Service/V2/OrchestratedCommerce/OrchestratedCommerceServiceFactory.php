<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\OrchestratedCommerce;

/**
 * Service factory class for API resources in the OrchestratedCommerce namespace.
 *
 * @property AgreementService $agreements
 */
class OrchestratedCommerceServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'agreements' => AgreementService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
