<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\Billing;

/**
 * Service factory class for API resources in the Billing namespace.
 *
 * @property MeterEventAdjustmentService $meterEventAdjustments
 * @property MeterEventService $meterEvents
 * @property MeterEventSessionService $meterEventSession
 * @property MeterEventStreamService $meterEventStream
 */
class BillingServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'meterEventAdjustments' => MeterEventAdjustmentService::class,
        'meterEvents' => MeterEventService::class,
        'meterEventSession' => MeterEventSessionService::class,
        'meterEventStream' => MeterEventStreamService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
