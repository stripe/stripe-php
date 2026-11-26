<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\V1;

/**
 * Service factory class for API resources in the V1 namespace.
 *
 * @property \Stripe\Service\AccountLinkService $accountLinks
 * @property \Stripe\Service\AccountNoticeService $accountNotices
 * @property \Stripe\Service\AccountService $accounts
 * @property \Stripe\Service\AccountSessionService $accountSessions
 * @property \Stripe\Service\ApplePayDomainService $applePayDomains
 * @property \Stripe\Service\ApplicationFeeService $applicationFees
 * @property \Stripe\Service\Apps\AppsServiceFactory $apps
 * @property \Stripe\Service\BalanceService $balance
 * @property \Stripe\Service\BalanceSettingsService $balanceSettings
 * @property \Stripe\Service\BalanceTransactionService $balanceTransactions
 * @property \Stripe\Service\Billing\BillingServiceFactory $billing
 * @property \Stripe\Service\BillingPortal\BillingPortalServiceFactory $billingPortal
 * @property \Stripe\Service\Capital\CapitalServiceFactory $capital
 * @property \Stripe\Service\ChargeService $charges
 * @property \Stripe\Service\Checkout\CheckoutServiceFactory $checkout
 * @property \Stripe\Service\Climate\ClimateServiceFactory $climate
 * @property \Stripe\Service\ConfirmationTokenService $confirmationTokens
 * @property \Stripe\Service\CountrySpecService $countrySpecs
 * @property \Stripe\Service\CouponService $coupons
 * @property \Stripe\Service\CreditNoteService $creditNotes
 * @property \Stripe\Service\CustomerService $customers
 * @property \Stripe\Service\CustomerSessionService $customerSessions
 * @property \Stripe\Service\DisputeService $disputes
 * @property \Stripe\Service\Entitlements\EntitlementsServiceFactory $entitlements
 * @property \Stripe\Service\EphemeralKeyService $ephemeralKeys
 * @property \Stripe\Service\EventService $events
 * @property \Stripe\Service\ExchangeRateService $exchangeRates
 * @property \Stripe\Service\ExternalAccountService $externalAccounts
 * @property \Stripe\Service\FileLinkService $fileLinks
 * @property \Stripe\Service\FileService $files
 * @property \Stripe\Service\FinancialConnections\FinancialConnectionsServiceFactory $financialConnections
 * @property \Stripe\Service\Forwarding\ForwardingServiceFactory $forwarding
 * @property \Stripe\Service\FxQuoteService $fxQuotes
 * @property \Stripe\Service\Identity\IdentityServiceFactory $identity
 * @property \Stripe\Service\InvoiceItemService $invoiceItems
 * @property \Stripe\Service\InvoicePaymentService $invoicePayments
 * @property \Stripe\Service\InvoiceRenderingTemplateService $invoiceRenderingTemplates
 * @property \Stripe\Service\InvoiceService $invoices
 * @property \Stripe\Service\Issuing\IssuingServiceFactory $issuing
 * @property \Stripe\Service\MandateService $mandates
 * @property \Stripe\Service\MarginService $margins
 * @property \Stripe\Service\OrderService $orders
 * @property \Stripe\Service\PaymentAttemptRecordService $paymentAttemptRecords
 * @property \Stripe\Service\PaymentIntentService $paymentIntents
 * @property \Stripe\Service\PaymentLinkService $paymentLinks
 * @property \Stripe\Service\PaymentMethodConfigurationService $paymentMethodConfigurations
 * @property \Stripe\Service\PaymentMethodDomainService $paymentMethodDomains
 * @property \Stripe\Service\PaymentMethodService $paymentMethods
 * @property \Stripe\Service\PaymentPlanService $paymentPlans
 * @property \Stripe\Service\PaymentRecordService $paymentRecords
 * @property \Stripe\Service\PayoutService $payouts
 * @property \Stripe\Service\PlanService $plans
 * @property \Stripe\Service\PriceService $prices
 * @property \Stripe\Service\Privacy\PrivacyServiceFactory $privacy
 * @property \Stripe\Service\ProductCatalog\ProductCatalogServiceFactory $productCatalog
 * @property \Stripe\Service\ProductService $products
 * @property \Stripe\Service\PromotionCodeService $promotionCodes
 * @property \Stripe\Service\QuoteService $quotes
 * @property \Stripe\Service\Radar\RadarServiceFactory $radar
 * @property \Stripe\Service\RefundService $refunds
 * @property \Stripe\Service\Reporting\ReportingServiceFactory $reporting
 * @property \Stripe\Service\Reserve\ReserveServiceFactory $reserve
 * @property \Stripe\Service\ReviewService $reviews
 * @property \Stripe\Service\SetupAttemptService $setupAttempts
 * @property \Stripe\Service\SetupIntentService $setupIntents
 * @property \Stripe\Service\SharedPayment\SharedPaymentServiceFactory $sharedPayment
 * @property \Stripe\Service\ShippingRateService $shippingRates
 * @property \Stripe\Service\Sigma\SigmaServiceFactory $sigma
 * @property \Stripe\Service\SourceService $sources
 * @property \Stripe\Service\SubscriptionItemService $subscriptionItems
 * @property \Stripe\Service\SubscriptionService $subscriptions
 * @property \Stripe\Service\SubscriptionScheduleService $subscriptionSchedules
 * @property \Stripe\Service\Tax\TaxServiceFactory $tax
 * @property \Stripe\Service\TaxCodeService $taxCodes
 * @property \Stripe\Service\TaxIdService $taxIds
 * @property \Stripe\Service\TaxRateService $taxRates
 * @property \Stripe\Service\Terminal\TerminalServiceFactory $terminal
 * @property \Stripe\Service\TestHelpers\TestHelpersServiceFactory $testHelpers
 * @property \Stripe\Service\ThreeDSecure\ThreeDSecureServiceFactory $threeDSecure
 * @property \Stripe\Service\TokenService $tokens
 * @property \Stripe\Service\TopupService $topups
 * @property \Stripe\Service\TransferService $transfers
 * @property \Stripe\Service\Treasury\TreasuryServiceFactory $treasury
 * @property \Stripe\Service\WebhookEndpointService $webhookEndpoints
 */
class V1ServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'accountLinks' => \Stripe\Service\AccountLinkService::class,
        'accountNotices' => \Stripe\Service\AccountNoticeService::class,
        'accounts' => \Stripe\Service\AccountService::class,
        'accountSessions' => \Stripe\Service\AccountSessionService::class,
        'applePayDomains' => \Stripe\Service\ApplePayDomainService::class,
        'applicationFees' => \Stripe\Service\ApplicationFeeService::class,
        'apps' => \Stripe\Service\Apps\AppsServiceFactory::class,
        'balance' => \Stripe\Service\BalanceService::class,
        'balanceSettings' => \Stripe\Service\BalanceSettingsService::class,
        'balanceTransactions' => \Stripe\Service\BalanceTransactionService::class,
        'billing' => \Stripe\Service\Billing\BillingServiceFactory::class,
        'billingPortal' => \Stripe\Service\BillingPortal\BillingPortalServiceFactory::class,
        'capital' => \Stripe\Service\Capital\CapitalServiceFactory::class,
        'charges' => \Stripe\Service\ChargeService::class,
        'checkout' => \Stripe\Service\Checkout\CheckoutServiceFactory::class,
        'climate' => \Stripe\Service\Climate\ClimateServiceFactory::class,
        'confirmationTokens' => \Stripe\Service\ConfirmationTokenService::class,
        'countrySpecs' => \Stripe\Service\CountrySpecService::class,
        'coupons' => \Stripe\Service\CouponService::class,
        'creditNotes' => \Stripe\Service\CreditNoteService::class,
        'customers' => \Stripe\Service\CustomerService::class,
        'customerSessions' => \Stripe\Service\CustomerSessionService::class,
        'disputes' => \Stripe\Service\DisputeService::class,
        'entitlements' => \Stripe\Service\Entitlements\EntitlementsServiceFactory::class,
        'ephemeralKeys' => \Stripe\Service\EphemeralKeyService::class,
        'events' => \Stripe\Service\EventService::class,
        'exchangeRates' => \Stripe\Service\ExchangeRateService::class,
        'externalAccounts' => \Stripe\Service\ExternalAccountService::class,
        'fileLinks' => \Stripe\Service\FileLinkService::class,
        'files' => \Stripe\Service\FileService::class,
        'financialConnections' => \Stripe\Service\FinancialConnections\FinancialConnectionsServiceFactory::class,
        'forwarding' => \Stripe\Service\Forwarding\ForwardingServiceFactory::class,
        'fxQuotes' => \Stripe\Service\FxQuoteService::class,
        'identity' => \Stripe\Service\Identity\IdentityServiceFactory::class,
        'invoiceItems' => \Stripe\Service\InvoiceItemService::class,
        'invoicePayments' => \Stripe\Service\InvoicePaymentService::class,
        'invoiceRenderingTemplates' => \Stripe\Service\InvoiceRenderingTemplateService::class,
        'invoices' => \Stripe\Service\InvoiceService::class,
        'issuing' => \Stripe\Service\Issuing\IssuingServiceFactory::class,
        'mandates' => \Stripe\Service\MandateService::class,
        'margins' => \Stripe\Service\MarginService::class,
        'orders' => \Stripe\Service\OrderService::class,
        'paymentAttemptRecords' => \Stripe\Service\PaymentAttemptRecordService::class,
        'paymentIntents' => \Stripe\Service\PaymentIntentService::class,
        'paymentLinks' => \Stripe\Service\PaymentLinkService::class,
        'paymentMethodConfigurations' => \Stripe\Service\PaymentMethodConfigurationService::class,
        'paymentMethodDomains' => \Stripe\Service\PaymentMethodDomainService::class,
        'paymentMethods' => \Stripe\Service\PaymentMethodService::class,
        'paymentPlans' => \Stripe\Service\PaymentPlanService::class,
        'paymentRecords' => \Stripe\Service\PaymentRecordService::class,
        'payouts' => \Stripe\Service\PayoutService::class,
        'plans' => \Stripe\Service\PlanService::class,
        'prices' => \Stripe\Service\PriceService::class,
        'privacy' => \Stripe\Service\Privacy\PrivacyServiceFactory::class,
        'productCatalog' => \Stripe\Service\ProductCatalog\ProductCatalogServiceFactory::class,
        'products' => \Stripe\Service\ProductService::class,
        'promotionCodes' => \Stripe\Service\PromotionCodeService::class,
        'quotes' => \Stripe\Service\QuoteService::class,
        'radar' => \Stripe\Service\Radar\RadarServiceFactory::class,
        'refunds' => \Stripe\Service\RefundService::class,
        'reporting' => \Stripe\Service\Reporting\ReportingServiceFactory::class,
        'reserve' => \Stripe\Service\Reserve\ReserveServiceFactory::class,
        'reviews' => \Stripe\Service\ReviewService::class,
        'setupAttempts' => \Stripe\Service\SetupAttemptService::class,
        'setupIntents' => \Stripe\Service\SetupIntentService::class,
        'sharedPayment' => \Stripe\Service\SharedPayment\SharedPaymentServiceFactory::class,
        'shippingRates' => \Stripe\Service\ShippingRateService::class,
        'sigma' => \Stripe\Service\Sigma\SigmaServiceFactory::class,
        'sources' => \Stripe\Service\SourceService::class,
        'subscriptionItems' => \Stripe\Service\SubscriptionItemService::class,
        'subscriptions' => \Stripe\Service\SubscriptionService::class,
        'subscriptionSchedules' => \Stripe\Service\SubscriptionScheduleService::class,
        'tax' => \Stripe\Service\Tax\TaxServiceFactory::class,
        'taxCodes' => \Stripe\Service\TaxCodeService::class,
        'taxIds' => \Stripe\Service\TaxIdService::class,
        'taxRates' => \Stripe\Service\TaxRateService::class,
        'terminal' => \Stripe\Service\Terminal\TerminalServiceFactory::class,
        'testHelpers' => \Stripe\Service\TestHelpers\TestHelpersServiceFactory::class,
        'threeDSecure' => \Stripe\Service\ThreeDSecure\ThreeDSecureServiceFactory::class,
        'tokens' => \Stripe\Service\TokenService::class,
        'topups' => \Stripe\Service\TopupService::class,
        'transfers' => \Stripe\Service\TransferService::class,
        'treasury' => \Stripe\Service\Treasury\TreasuryServiceFactory::class,
        'webhookEndpoints' => \Stripe\Service\WebhookEndpointService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
