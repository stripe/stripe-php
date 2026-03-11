<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Orchestration;

/**
 * Service factory class for API resources in the Orchestration namespace.
 *
 * @property PaymentAttemptService $paymentAttempts
 */
class OrchestrationServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'paymentAttempts' => PaymentAttemptService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
