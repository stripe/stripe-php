<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\GiftCards;

/**
 * Service factory class for API resources in the GiftCards namespace.
 *
 * @property CardService $cards
 * @property TransactionService $transactions
 */
class GiftCardsServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'cards' => CardService::class,
        'transactions' => TransactionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
