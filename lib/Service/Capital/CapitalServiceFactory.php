<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Capital;

/**
 * Service factory class for API resources in the Capital namespace.
 *
 * @property FinancingOfferService $financingOffers
 * @property FinancingSummaryService $financingSummary
 * @property FinancingTransactionService $financingTransactions
 */
class CapitalServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'financingOffers' => FinancingOfferService::class,
        'financingSummary' => FinancingSummaryService::class,
        'financingTransactions' => FinancingTransactionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
