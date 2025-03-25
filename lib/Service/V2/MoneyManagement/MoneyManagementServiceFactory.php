<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * Service factory class for API resources in the MoneyManagement namespace.
 *
 * @property OutboundSetupIntentService $outboundSetupIntents
 * @property PayoutMethodService $payoutMethods
 * @property PayoutMethodsBankAccountSpecService $payoutMethodsBankAccountSpec
 */
class MoneyManagementServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'outboundSetupIntents' => OutboundSetupIntentService::class,
        'payoutMethods' => PayoutMethodService::class,
        'payoutMethodsBankAccountSpec' => PayoutMethodsBankAccountSpecService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
