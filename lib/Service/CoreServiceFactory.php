<?php

namespace Stripe\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property AccountLinkService $accountLinks
 * @property AccountService $accounts
 * @property ApplePayDomainService $applePayDomains
 * @property ApplicationFeeService $applicationFees
 * @property BalanceTransactionService $balanceTransactions
 * @property BalanceService $balances
 * @property ChargeService $charges
 * @property Checkout\CheckoutServiceFactory $checkout
 * @property CountrySpecService $countrySpecs
 * @property CouponService $coupons
 * @property CreditNoteService $creditNotes
 * @property CustomerService $customers
 * @property DisputeService $disputes
 * @property EphemeralKeyService $ephemeralKeys
 * @property EventService $events
 * @property ExchangeRateService $exchangeRates
 * @property FileLinkService $fileLinks
 * @property FileService $files
 * @property InvoiceItemService $invoiceItems
 * @property InvoiceService $invoices
 * @property Issuing\IssuingServiceFactory $issuing
 * @property MandateService $mandates
 * @property OrderReturnService $orderReturns
 * @property OrderService $orders
 * @property PaymentIntentService $paymentIntents
 * @property PaymentMethodService $paymentMethods
 * @property PayoutService $payouts
 * @property PlanService $plans
 * @property ProductService $products
 * @property Radar\RadarServiceFactory $radar
 * @property RefundService $refunds
 * @property Reporting\ReportingServiceFactory $reporting
 * @property ReviewService $reviews
 * @property SetupIntentService $setupIntents
 * @property Sigma\SigmaServiceFactory $sigma
 * @property SkuService $skus
 * @property SourceService $sources
 * @property SubscriptionItemService $subscriptionItems
 * @property SubscriptionScheduleService $subscriptionSchedules
 * @property SubscriptionService $subscriptions
 * @property TaxRateService $taxRates
 * @property Terminal\TerminalServiceFactory $terminal
 * @property TokenService $tokens
 * @property TopupService $topups
 * @property TransferService $transfers
 * @property WebhookEndpointService $webhookEndpoints
 */
class CoreServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'accountLinks' => AccountLinkService::class,
        'accounts' => AccountService::class,
        'applePayDomains' => ApplePayDomainService::class,
        'applicationFees' => ApplicationFeeService::class,
        'balanceTransactions' => BalanceTransactionService::class,
        'balances' => BalanceService::class,
        'charges' => ChargeService::class,
        'checkout' => Checkout\CheckoutServiceFactory::class,
        'countrySpecs' => CountrySpecService::class,
        'coupons' => CouponService::class,
        'creditNotes' => CreditNoteService::class,
        'customers' => CustomerService::class,
        'disputes' => DisputeService::class,
        'ephemeralKeys' => EphemeralKeyService::class,
        'events' => EventService::class,
        'exchangeRates' => ExchangeRateService::class,
        'fileLinks' => FileLinkService::class,
        'files' => FileService::class,
        'invoiceItems' => InvoiceItemService::class,
        'invoices' => InvoiceService::class,
        'issuing' => Issuing\IssuingServiceFactory::class,
        'mandates' => MandateService::class,
        'orderReturns' => OrderReturnService::class,
        'orders' => OrderService::class,
        'paymentIntents' => PaymentIntentService::class,
        'paymentMethods' => PaymentMethodService::class,
        'payouts' => PayoutService::class,
        'plans' => PlanService::class,
        'products' => ProductService::class,
        'radar' => Radar\RadarServiceFactory::class,
        'refunds' => RefundService::class,
        'reporting' => Reporting\ReportingServiceFactory::class,
        'reviews' => ReviewService::class,
        'setupIntents' => SetupIntentService::class,
        'sigma' => Sigma\SigmaServiceFactory::class,
        'skus' => SkuService::class,
        'sources' => SourceService::class,
        'subscriptionItems' => SubscriptionItemService::class,
        'subscriptionSchedules' => SubscriptionScheduleService::class,
        'subscriptions' => SubscriptionService::class,
        'taxRates' => TaxRateService::class,
        'terminal' => Terminal\TerminalServiceFactory::class,
        'tokens' => TokenService::class,
        'topups' => TopupService::class,
        'transfers' => TransferService::class,
        'webhookEndpoints' => WebhookEndpointService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
