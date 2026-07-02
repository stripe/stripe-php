<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Crypto;

/**
 * Service factory class for API resources in the Crypto namespace.
 *
 * @property CustomerService $customers
 * @property OnrampSessionService $onrampSessions
 * @property OnrampTransactionLimitsService $onrampTransactionLimits
 */
class CryptoServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'customers' => CustomerService::class,
        'onrampSessions' => OnrampSessionService::class,
        'onrampTransactionLimits' => OnrampTransactionLimitsService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
