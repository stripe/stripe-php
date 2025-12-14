<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\SharedPayment;

/**
 * Service factory class for API resources in the SharedPayment namespace.
 *
 * @property GrantedTokenService $grantedTokens
 */
class SharedPaymentServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'grantedTokens' => GrantedTokenService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
