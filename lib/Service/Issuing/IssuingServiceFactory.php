<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Issuing;

/**
 * Service factory class for API resources in the Issuing namespace.
 *
 * @property AuthorizationService $authorizations
 * @property CardholderService $cardholders
 * @property CardService $cards
 * @property CreditUnderwritingRecordService $creditUnderwritingRecords
 * @property DisputeService $disputes
 * @property PersonalizationDesignService $personalizationDesigns
 * @property PhysicalBundleService $physicalBundles
 * @property TokenService $tokens
 * @property TransactionService $transactions
 */
class IssuingServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'authorizations' => AuthorizationService::class,
        'cardholders' => CardholderService::class,
        'cards' => CardService::class,
        'creditUnderwritingRecords' => CreditUnderwritingRecordService::class,
        'disputes' => DisputeService::class,
        'personalizationDesigns' => PersonalizationDesignService::class,
        'physicalBundles' => PhysicalBundleService::class,
        'tokens' => TokenService::class,
        'transactions' => TransactionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
