<?php

namespace Stripe;

/**
 * Client used to send requests to Stripe's API.
 *
 * @property Service\OAuthService $oauth
 * // The beginning of the section generated from our OpenAPI spec
 * @property Service\AccountLinkService $accountLinks
 * @property Service\AccountService $accounts
 * @property Service\AccountSessionService $accountSessions
 * @property Service\ApplePayDomainService $applePayDomains
 * @property Service\ApplicationFeeService $applicationFees
 * @property Service\Apps\AppsServiceFactory $apps
 * @property Service\BalanceService $balance
 * @property Service\BalanceTransactionService $balanceTransactions
 * @property Service\Billing\BillingServiceFactory $billing
 * @property Service\BillingPortal\BillingPortalServiceFactory $billingPortal
 * @property Service\ChargeService $charges
 * @property Service\Checkout\CheckoutServiceFactory $checkout
 * @property Service\Climate\ClimateServiceFactory $climate
 * @property Service\ConfirmationTokenService $confirmationTokens
 * @property Service\CountrySpecService $countrySpecs
 * @property Service\CouponService $coupons
 * @property Service\CreditNoteService $creditNotes
 * @property Service\CustomerService $customers
 * @property Service\CustomerSessionService $customerSessions
 * @property Service\DisputeService $disputes
 * @property Service\Entitlements\EntitlementsServiceFactory $entitlements
 * @property Service\EphemeralKeyService $ephemeralKeys
 * @property Service\EventService $events
 * @property Service\ExchangeRateService $exchangeRates
 * @property Service\FileLinkService $fileLinks
 * @property Service\FileService $files
 * @property Service\FinancialConnections\FinancialConnectionsServiceFactory $financialConnections
 * @property Service\Forwarding\ForwardingServiceFactory $forwarding
 * @property Service\Identity\IdentityServiceFactory $identity
 * @property Service\InvoiceItemService $invoiceItems
 * @property Service\InvoicePaymentService $invoicePayments
 * @property Service\InvoiceRenderingTemplateService $invoiceRenderingTemplates
 * @property Service\InvoiceService $invoices
 * @property Service\Issuing\IssuingServiceFactory $issuing
 * @property Service\MandateService $mandates
 * @property Service\PaymentIntentService $paymentIntents
 * @property Service\PaymentLinkService $paymentLinks
 * @property Service\PaymentMethodConfigurationService $paymentMethodConfigurations
 * @property Service\PaymentMethodDomainService $paymentMethodDomains
 * @property Service\PaymentMethodService $paymentMethods
 * @property Service\PayoutService $payouts
 * @property Service\PlanService $plans
 * @property Service\PriceService $prices
 * @property Service\ProductService $products
 * @property Service\PromotionCodeService $promotionCodes
 * @property Service\QuoteService $quotes
 * @property Service\Radar\RadarServiceFactory $radar
 * @property Service\RefundService $refunds
 * @property Service\Reporting\ReportingServiceFactory $reporting
 * @property Service\ReviewService $reviews
 * @property Service\SetupAttemptService $setupAttempts
 * @property Service\SetupIntentService $setupIntents
 * @property Service\ShippingRateService $shippingRates
 * @property Service\Sigma\SigmaServiceFactory $sigma
 * @property Service\SourceService $sources
 * @property Service\SubscriptionItemService $subscriptionItems
 * @property Service\SubscriptionService $subscriptions
 * @property Service\SubscriptionScheduleService $subscriptionSchedules
 * @property Service\Tax\TaxServiceFactory $tax
 * @property Service\TaxCodeService $taxCodes
 * @property Service\TaxIdService $taxIds
 * @property Service\TaxRateService $taxRates
 * @property Service\Terminal\TerminalServiceFactory $terminal
 * @property Service\TestHelpers\TestHelpersServiceFactory $testHelpers
 * @property Service\TokenService $tokens
 * @property Service\TopupService $topups
 * @property Service\TransferService $transfers
 * @property Service\Treasury\TreasuryServiceFactory $treasury
 * @property Service\V2\V2ServiceFactory $v2
 * @property Service\WebhookEndpointService $webhookEndpoints
 * // The end of the section generated from our OpenAPI spec
 */
class StripeClient extends BaseStripeClient
{
    /**
     * @var Service\CoreServiceFactory
     */
    private $coreServiceFactory;

    public function __get($name)
    {
        return $this->getService($name);
    }

    public function getService($name)
    {
        if (null === $this->coreServiceFactory) {
            $this->coreServiceFactory = new Service\CoreServiceFactory($this);
        }

        return $this->coreServiceFactory->getService($name);
    }
}
