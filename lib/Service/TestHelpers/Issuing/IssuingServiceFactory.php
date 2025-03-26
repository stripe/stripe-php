<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\TestHelpers\Issuing;

/**
 * Service factory class for API resources in the Issuing namespace.
 *
 * @property AuthorizationService $authorizations
 * @property CardService $cards
 * @property PersonalizationDesignService $personalizationDesigns
 * @property TransactionService $transactions
 */
class IssuingServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'authorizations' => AuthorizationService::class,
        'cards' => CardService::class,
        'personalizationDesigns' => PersonalizationDesignService::class,
        'transactions' => TransactionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
