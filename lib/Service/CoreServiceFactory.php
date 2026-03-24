<?php

namespace Stripe\Service;

/**
 * Service factory class for API resources in the root namespace.
 *
 * @property OAuthService $oauth
 * // Doc: The beginning of the section generated from our OpenAPI spec
 * @property AccountLinkService $accountLinks
 * @property AccountService $accounts
 * @property AccountSessionService $accountSessions
 * @property ApplePayDomainService $applePayDomains
 * @property ApplicationFeeService $applicationFees
 * @property Apps\AppsServiceFactory $apps
 * @property BalanceService $balance
 * @property BalanceSettingsService $balanceSettings
 * @property BalanceTransactionService $balanceTransactions
 * @property Billing\BillingServiceFactory $billing
 * @property BillingPortal\BillingPortalServiceFactory $billingPortal
 * @property ChargeService $charges
 * @property Checkout\CheckoutServiceFactory $checkout
 * @property Climate\ClimateServiceFactory $climate
 * @property ConfirmationTokenService $confirmationTokens
 * @property CountrySpecService $countrySpecs
 * @property CouponService $coupons
 * @property CreditNoteService $creditNotes
 * @property CustomerService $customers
 * @property CustomerSessionService $customerSessions
 * @property DisputeService $disputes
 * @property Entitlements\EntitlementsServiceFactory $entitlements
 * @property EphemeralKeyService $ephemeralKeys
 * @property EventService $events
 * @property ExchangeRateService $exchangeRates
 * @property FileLinkService $fileLinks
 * @property FileService $files
 * @property FinancialConnections\FinancialConnectionsServiceFactory $financialConnections
 * @property Forwarding\ForwardingServiceFactory $forwarding
 * @property Identity\IdentityServiceFactory $identity
 * @property InvoiceItemService $invoiceItems
 * @property InvoicePaymentService $invoicePayments
 * @property InvoiceRenderingTemplateService $invoiceRenderingTemplates
 * @property InvoiceService $invoices
 * @property Issuing\IssuingServiceFactory $issuing
 * @property MandateService $mandates
 * @property PaymentAttemptRecordService $paymentAttemptRecords
 * @property PaymentIntentService $paymentIntents
 * @property PaymentLinkService $paymentLinks
 * @property PaymentMethodConfigurationService $paymentMethodConfigurations
 * @property PaymentMethodDomainService $paymentMethodDomains
 * @property PaymentMethodService $paymentMethods
 * @property PaymentRecordService $paymentRecords
 * @property PayoutService $payouts
 * @property PlanService $plans
 * @property PriceService $prices
 * @property ProductService $products
 * @property PromotionCodeService $promotionCodes
 * @property QuoteService $quotes
 * @property Radar\RadarServiceFactory $radar
 * @property RefundService $refunds
 * @property Reporting\ReportingServiceFactory $reporting
 * @property ReviewService $reviews
 * @property SetupAttemptService $setupAttempts
 * @property SetupIntentService $setupIntents
 * @property ShippingRateService $shippingRates
 * @property Sigma\SigmaServiceFactory $sigma
 * @property SourceService $sources
 * @property SubscriptionItemService $subscriptionItems
 * @property SubscriptionService $subscriptions
 * @property SubscriptionScheduleService $subscriptionSchedules
 * @property Tax\TaxServiceFactory $tax
 * @property TaxCodeService $taxCodes
 * @property TaxIdService $taxIds
 * @property TaxRateService $taxRates
 * @property Terminal\TerminalServiceFactory $terminal
 * @property TestHelpers\TestHelpersServiceFactory $testHelpers
 * @property TokenService $tokens
 * @property TopupService $topups
 * @property TransferService $transfers
 * @property Treasury\TreasuryServiceFactory $treasury
 * @property V2\V2ServiceFactory $v2
 * @property WebhookEndpointService $webhookEndpoints
 * // Doc: The end of the section generated from our OpenAPI spec
 */
class CoreServiceFactory extends AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'oauth' => OAuthService::class,
        // Class Map: The beginning of the section generated from our OpenAPI spec
        'accountLinks' => AccountLinkService::class,
        'accounts' => AccountService::class,
        'accountSessions' => AccountSessionService::class,
        'applePayDomains' => ApplePayDomainService::class,
        'applicationFees' => ApplicationFeeService::class,
        'apps' => Apps\AppsServiceFactory::class,
        'balance' => BalanceService::class,
        'balanceSettings' => BalanceSettingsService::class,
        'balanceTransactions' => BalanceTransactionService::class,
        'billing' => Billing\BillingServiceFactory::class,
        'billingPortal' => BillingPortal\BillingPortalServiceFactory::class,
        'charges' => ChargeService::class,
        'checkout' => Checkout\CheckoutServiceFactory::class,
        'climate' => Climate\ClimateServiceFactory::class,
        'confirmationTokens' => ConfirmationTokenService::class,
        'countrySpecs' => CountrySpecService::class,
        'coupons' => CouponService::class,
        'creditNotes' => CreditNoteService::class,
        'customers' => CustomerService::class,
        'customerSessions' => CustomerSessionService::class,
        'disputes' => DisputeService::class,
        'entitlements' => Entitlements\EntitlementsServiceFactory::class,
        'ephemeralKeys' => EphemeralKeyService::class,
        'events' => EventService::class,
        'exchangeRates' => ExchangeRateService::class,
        'fileLinks' => FileLinkService::class,
        'files' => FileService::class,
        'financialConnections' => FinancialConnections\FinancialConnectionsServiceFactory::class,
        'forwarding' => Forwarding\ForwardingServiceFactory::class,
        'identity' => Identity\IdentityServiceFactory::class,
        'invoiceItems' => InvoiceItemService::class,
        'invoicePayments' => InvoicePaymentService::class,
        'invoiceRenderingTemplates' => InvoiceRenderingTemplateService::class,
        'invoices' => InvoiceService::class,
        'issuing' => Issuing\IssuingServiceFactory::class,
        'mandates' => MandateService::class,
        'paymentAttemptRecords' => PaymentAttemptRecordService::class,
        'paymentIntents' => PaymentIntentService::class,
        'paymentLinks' => PaymentLinkService::class,
        'paymentMethodConfigurations' => PaymentMethodConfigurationService::class,
        'paymentMethodDomains' => PaymentMethodDomainService::class,
        'paymentMethods' => PaymentMethodService::class,
        'paymentRecords' => PaymentRecordService::class,
        'payouts' => PayoutService::class,
        'plans' => PlanService::class,
        'prices' => PriceService::class,
        'products' => ProductService::class,
        'promotionCodes' => PromotionCodeService::class,
        'quotes' => QuoteService::class,
        'radar' => Radar\RadarServiceFactory::class,
        'refunds' => RefundService::class,
        'reporting' => Reporting\ReportingServiceFactory::class,
        'reviews' => ReviewService::class,
        'setupAttempts' => SetupAttemptService::class,
        'setupIntents' => SetupIntentService::class,
        'shippingRates' => ShippingRateService::class,
        'sigma' => Sigma\SigmaServiceFactory::class,
        'sources' => SourceService::class,
        'subscriptionItems' => SubscriptionItemService::class,
        'subscriptions' => SubscriptionService::class,
        'subscriptionSchedules' => SubscriptionScheduleService::class,
        'tax' => Tax\TaxServiceFactory::class,
        'taxCodes' => TaxCodeService::class,
        'taxIds' => TaxIdService::class,
        'taxRates' => TaxRateService::class,
        'terminal' => Terminal\TerminalServiceFactory::class,
        'testHelpers' => TestHelpers\TestHelpersServiceFactory::class,
        'tokens' => TokenService::class,
        'topups' => TopupService::class,
        'transfers' => TransferService::class,
        'treasury' => Treasury\TreasuryServiceFactory::class,
        'v2' => V2\V2ServiceFactory::class,
        'webhookEndpoints' => WebhookEndpointService::class,
        // Class Map: The end of the section generated from our OpenAPI spec
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
