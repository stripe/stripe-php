<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V2\MoneyManagement;

/**
 * Service factory class for API resources in the MoneyManagement namespace.
 *
 * @property AdjustmentService $adjustments
 * @property CurrencyConversionService $currencyConversions
 * @property FinancialAccountService $financialAccounts
 * @property FinancialAddressService $financialAddresses
 * @property InboundTransferService $inboundTransfers
 * @property OutboundPaymentQuoteService $outboundPaymentQuotes
 * @property OutboundPaymentService $outboundPayments
 * @property OutboundSetupIntentService $outboundSetupIntents
 * @property OutboundTransferService $outboundTransfers
 * @property PayoutMethodService $payoutMethods
 * @property PayoutMethodsBankAccountSpecService $payoutMethodsBankAccountSpec
 * @property ReceivedCreditService $receivedCredits
 * @property ReceivedDebitService $receivedDebits
 * @property RecipientVerificationService $recipientVerifications
 * @property TransactionEntryService $transactionEntries
 * @property TransactionService $transactions
 */
class MoneyManagementServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'adjustments' => AdjustmentService::class,
        'currencyConversions' => CurrencyConversionService::class,
        'financialAccounts' => FinancialAccountService::class,
        'financialAddresses' => FinancialAddressService::class,
        'inboundTransfers' => InboundTransferService::class,
        'outboundPaymentQuotes' => OutboundPaymentQuoteService::class,
        'outboundPayments' => OutboundPaymentService::class,
        'outboundSetupIntents' => OutboundSetupIntentService::class,
        'outboundTransfers' => OutboundTransferService::class,
        'payoutMethods' => PayoutMethodService::class,
        'payoutMethodsBankAccountSpec' => PayoutMethodsBankAccountSpecService::class,
        'receivedCredits' => ReceivedCreditService::class,
        'receivedDebits' => ReceivedDebitService::class,
        'recipientVerifications' => RecipientVerificationService::class,
        'transactionEntries' => TransactionEntryService::class,
        'transactions' => TransactionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
