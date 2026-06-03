<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Signals;

/**
 * Service factory class for API resources in the Signals namespace.
 *
 * @property AccountSignalService $accountSignals
 */
class SignalsServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'accountSignals' => AccountSignalService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
