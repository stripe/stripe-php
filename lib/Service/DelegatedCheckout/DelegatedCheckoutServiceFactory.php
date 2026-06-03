<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\DelegatedCheckout;

/**
 * Service factory class for API resources in the DelegatedCheckout namespace.
 *
 * @property OrderService $orders
 * @property RequestedSessionService $requestedSessions
 */
class DelegatedCheckoutServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'orders' => OrderService::class,
        'requestedSessions' => RequestedSessionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
