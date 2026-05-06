<?php

// File copied from our code generator; changes here will be overwritten.

namespace Stripe;

class UnhandledNotificationDetails
{
    /** @var bool whether the SDK has types for this event */
    public $isKnownEventType;

    public function __construct($isKnownEventType)
    {
        $this->isKnownEventType = $isKnownEventType;
    }
}

class StripeEventNotificationHandler
{
    /** @var array<string, callable> */
    private $registeredHandlers = [];
    /** @var StripeClient */
    private $client;
    /** @var string */
    private $webhookSecret;
    private $hasHandledEvents = false;
    private $fallbackCallback;
    /** @var array<string, mixed> everything we need to duplicate a client */
    private $clientConfig;

    /**
     * Constructor for StripeEventNotificationHandler.
     *
     * @param StripeClient $client The Stripe client to use for API interactions
     * @param string $webhookSecret The webhook secret for verifying signatures
     * @param callable(Events\UnknownEventNotification, StripeClient, UnhandledNotificationDetails): void $fallbackCallback A callback that's invoked when
     */
    public function __construct($client, $webhookSecret, $fallbackCallback)
    {
        $this->client = $client;
        $this->webhookSecret = $webhookSecret;
        $this->fallbackCallback = $fallbackCallback;

        // Extract configuration from the client for creating new instances
        $this->clientConfig = [
            'api_key' => $client->getApiKey(),
            'client_id' => $client->getClientId(),
            'stripe_account' => $client->getStripeAccount(),
            'stripe_version' => $client->getStripeVersion(),
            'api_base' => $client->getApiBase(),
            'connect_base' => $client->getConnectBase(),
            'files_base' => $client->getFilesBase(),
            'meter_events_base' => $client->getMeterEventsBase(),
            'max_network_retries' => $client->getMaxNetworkRetries(),
            'app_info' => $client->getAppInfo(),
        ];
    }

    /**
     * Handles an incoming webhook payload by dispatching to the appropriate registered handler, if available.
     *
     * @param string $payload The raw webhook payload
     * @param string $sigHeader The value of the Stripe-Signature header
     *
     * @return void
     *
     * @throws Exception\UnexpectedValueException if no handler is registered for the event type
     * @throws \Exception any exception that may be thrown by a registered function
     */
    public function handle($payload, $sigHeader)
    {
        // we're ok with this write being naiive because the expectation is that users register functions
        $this->hasHandledEvents = true;

        $notif = $this->client->parseEventNotification(
            $payload,
            $sigHeader,
            $this->webhookSecret
        );

        $eventType = $notif->type;

        // Create a new client instance with the event's context instead of modifying the shared client
        $eventClient = $this->createClientWithContext($notif->context);

        if (isset($this->registeredHandlers[$eventType])) {
            \call_user_func($this->registeredHandlers[$eventType], $notif, $eventClient);
        } else {
            \call_user_func($this->fallbackCallback, $notif, $eventClient, new UnhandledNotificationDetails(!$notif instanceof Events\UnknownEventNotification));
        }
    }

    /**
     * Creates a new StripeClient instance with the specified stripe_context.
     *
     * @param null|string $context The stripe_context to use for the new client
     *
     * @return StripeClient A new StripeClient instance with the specified context
     */
    private function createClientWithContext($context)
    {
        $config = $this->clientConfig;
        $config['stripe_context'] = $context;

        return new StripeClient($config);
    }

    /**
     * Returns a sorted list of registered event types.
     *
     * @return string[] List of registered event type strings
     */
    public function getRegisteredHandlers()
    {
        $eventTypes = array_keys($this->registeredHandlers);
        \sort($eventTypes);

        return $eventTypes;
    }

    /**
     * Registers a handler for a specific event type.
     *
     * @param string $eventType The event type to register the handler for
     * @param callable $handler The handler function to call when the event is received
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    private function register($eventType, $handler)
    {
        if ($this->hasHandledEvents) {
            throw new Exception\BadMethodCallException('Cannot register new event handlers after .handle() has been called. This is indicative of a bug.');
        }
        if (isset($this->registeredHandlers[$eventType])) {
            throw new Exception\InvalidArgumentException("Handler for event type \"{$eventType}\" is already registered");
        }

        $this->registeredHandlers[$eventType] = $handler;
    }

    // event-handler-methods: The beginning of the section generated from our OpenAPI spec
    /**
     * Registers a handler for the "v1.account.application.authorized" event.
     *
     * @param callable(Events\V1AccountApplicationAuthorizedEvent, StripeClient): void $handler Handles v1.account.application.authorized events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountApplicationAuthorized($handler)
    {
        $this->register('v1.account.application.authorized', $handler);
    }

    /**
     * Registers a handler for the "v1.account.application.deauthorized" event.
     *
     * @param callable(Events\V1AccountApplicationDeauthorizedEvent, StripeClient): void $handler Handles v1.account.application.deauthorized events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountApplicationDeauthorized($handler)
    {
        $this->register('v1.account.application.deauthorized', $handler);
    }

    /**
     * Registers a handler for the "v1.account.external_account.created" event.
     *
     * @param callable(Events\V1AccountExternalAccountCreatedEvent, StripeClient): void $handler Handles v1.account.external_account.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountExternalAccountCreated($handler)
    {
        $this->register('v1.account.external_account.created', $handler);
    }

    /**
     * Registers a handler for the "v1.account.external_account.deleted" event.
     *
     * @param callable(Events\V1AccountExternalAccountDeletedEvent, StripeClient): void $handler Handles v1.account.external_account.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountExternalAccountDeleted($handler)
    {
        $this->register('v1.account.external_account.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.account.external_account.updated" event.
     *
     * @param callable(Events\V1AccountExternalAccountUpdatedEvent, StripeClient): void $handler Handles v1.account.external_account.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountExternalAccountUpdated($handler)
    {
        $this->register('v1.account.external_account.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.account.updated" event.
     *
     * @param callable(Events\V1AccountUpdatedEvent, StripeClient): void $handler Handles v1.account.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountUpdated($handler)
    {
        $this->register('v1.account.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.account_signals[delinquency].created" event.
     *
     * @param callable(Events\V1AccountSignalsIncludingDelinquencyCreatedEvent, StripeClient): void $handler Handles v1.account_signals[delinquency].created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountSignalsIncludingDelinquencyCreated($handler)
    {
        $this->register('v1.account_signals[delinquency].created', $handler);
    }

    /**
     * Registers a handler for the "v1.application_fee.created" event.
     *
     * @param callable(Events\V1ApplicationFeeCreatedEvent, StripeClient): void $handler Handles v1.application_fee.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ApplicationFeeCreated($handler)
    {
        $this->register('v1.application_fee.created', $handler);
    }

    /**
     * Registers a handler for the "v1.application_fee.refund.updated" event.
     *
     * @param callable(Events\V1ApplicationFeeRefundUpdatedEvent, StripeClient): void $handler Handles v1.application_fee.refund.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ApplicationFeeRefundUpdated($handler)
    {
        $this->register('v1.application_fee.refund.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.application_fee.refunded" event.
     *
     * @param callable(Events\V1ApplicationFeeRefundedEvent, StripeClient): void $handler Handles v1.application_fee.refunded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ApplicationFeeRefunded($handler)
    {
        $this->register('v1.application_fee.refunded', $handler);
    }

    /**
     * Registers a handler for the "v1.balance.available" event.
     *
     * @param callable(Events\V1BalanceAvailableEvent, StripeClient): void $handler Handles v1.balance.available events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BalanceAvailable($handler)
    {
        $this->register('v1.balance.available', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.alert.triggered" event.
     *
     * @param callable(Events\V1BillingAlertTriggeredEvent, StripeClient): void $handler Handles v1.billing.alert.triggered events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingAlertTriggered($handler)
    {
        $this->register('v1.billing.alert.triggered', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.meter.error_report_triggered" event.
     *
     * @param callable(Events\V1BillingMeterErrorReportTriggeredEvent, StripeClient): void $handler Handles v1.billing.meter.error_report_triggered events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingMeterErrorReportTriggered($handler)
    {
        $this->register('v1.billing.meter.error_report_triggered', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.meter.no_meter_found" event.
     *
     * @param callable(Events\V1BillingMeterNoMeterFoundEvent, StripeClient): void $handler Handles v1.billing.meter.no_meter_found events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingMeterNoMeterFound($handler)
    {
        $this->register('v1.billing.meter.no_meter_found', $handler);
    }

    /**
     * Registers a handler for the "v1.billing_portal.configuration.created" event.
     *
     * @param callable(Events\V1BillingPortalConfigurationCreatedEvent, StripeClient): void $handler Handles v1.billing_portal.configuration.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingPortalConfigurationCreated($handler)
    {
        $this->register('v1.billing_portal.configuration.created', $handler);
    }

    /**
     * Registers a handler for the "v1.billing_portal.configuration.updated" event.
     *
     * @param callable(Events\V1BillingPortalConfigurationUpdatedEvent, StripeClient): void $handler Handles v1.billing_portal.configuration.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingPortalConfigurationUpdated($handler)
    {
        $this->register('v1.billing_portal.configuration.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.billing_portal.session.created" event.
     *
     * @param callable(Events\V1BillingPortalSessionCreatedEvent, StripeClient): void $handler Handles v1.billing_portal.session.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingPortalSessionCreated($handler)
    {
        $this->register('v1.billing_portal.session.created', $handler);
    }

    /**
     * Registers a handler for the "v1.capability.updated" event.
     *
     * @param callable(Events\V1CapabilityUpdatedEvent, StripeClient): void $handler Handles v1.capability.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CapabilityUpdated($handler)
    {
        $this->register('v1.capability.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.cash_balance.funds_available" event.
     *
     * @param callable(Events\V1CashBalanceFundsAvailableEvent, StripeClient): void $handler Handles v1.cash_balance.funds_available events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CashBalanceFundsAvailable($handler)
    {
        $this->register('v1.cash_balance.funds_available', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.captured" event.
     *
     * @param callable(Events\V1ChargeCapturedEvent, StripeClient): void $handler Handles v1.charge.captured events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeCaptured($handler)
    {
        $this->register('v1.charge.captured', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.dispute.closed" event.
     *
     * @param callable(Events\V1ChargeDisputeClosedEvent, StripeClient): void $handler Handles v1.charge.dispute.closed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeDisputeClosed($handler)
    {
        $this->register('v1.charge.dispute.closed', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.dispute.created" event.
     *
     * @param callable(Events\V1ChargeDisputeCreatedEvent, StripeClient): void $handler Handles v1.charge.dispute.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeDisputeCreated($handler)
    {
        $this->register('v1.charge.dispute.created', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.dispute.funds_reinstated" event.
     *
     * @param callable(Events\V1ChargeDisputeFundsReinstatedEvent, StripeClient): void $handler Handles v1.charge.dispute.funds_reinstated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeDisputeFundsReinstated($handler)
    {
        $this->register('v1.charge.dispute.funds_reinstated', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.dispute.funds_withdrawn" event.
     *
     * @param callable(Events\V1ChargeDisputeFundsWithdrawnEvent, StripeClient): void $handler Handles v1.charge.dispute.funds_withdrawn events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeDisputeFundsWithdrawn($handler)
    {
        $this->register('v1.charge.dispute.funds_withdrawn', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.dispute.updated" event.
     *
     * @param callable(Events\V1ChargeDisputeUpdatedEvent, StripeClient): void $handler Handles v1.charge.dispute.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeDisputeUpdated($handler)
    {
        $this->register('v1.charge.dispute.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.expired" event.
     *
     * @param callable(Events\V1ChargeExpiredEvent, StripeClient): void $handler Handles v1.charge.expired events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeExpired($handler)
    {
        $this->register('v1.charge.expired', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.failed" event.
     *
     * @param callable(Events\V1ChargeFailedEvent, StripeClient): void $handler Handles v1.charge.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeFailed($handler)
    {
        $this->register('v1.charge.failed', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.pending" event.
     *
     * @param callable(Events\V1ChargePendingEvent, StripeClient): void $handler Handles v1.charge.pending events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargePending($handler)
    {
        $this->register('v1.charge.pending', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.refund.updated" event.
     *
     * @param callable(Events\V1ChargeRefundUpdatedEvent, StripeClient): void $handler Handles v1.charge.refund.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeRefundUpdated($handler)
    {
        $this->register('v1.charge.refund.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.refunded" event.
     *
     * @param callable(Events\V1ChargeRefundedEvent, StripeClient): void $handler Handles v1.charge.refunded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeRefunded($handler)
    {
        $this->register('v1.charge.refunded', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.succeeded" event.
     *
     * @param callable(Events\V1ChargeSucceededEvent, StripeClient): void $handler Handles v1.charge.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeSucceeded($handler)
    {
        $this->register('v1.charge.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v1.charge.updated" event.
     *
     * @param callable(Events\V1ChargeUpdatedEvent, StripeClient): void $handler Handles v1.charge.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ChargeUpdated($handler)
    {
        $this->register('v1.charge.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.checkout.session.async_payment_failed" event.
     *
     * @param callable(Events\V1CheckoutSessionAsyncPaymentFailedEvent, StripeClient): void $handler Handles v1.checkout.session.async_payment_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CheckoutSessionAsyncPaymentFailed($handler)
    {
        $this->register('v1.checkout.session.async_payment_failed', $handler);
    }

    /**
     * Registers a handler for the "v1.checkout.session.async_payment_succeeded" event.
     *
     * @param callable(Events\V1CheckoutSessionAsyncPaymentSucceededEvent, StripeClient): void $handler Handles v1.checkout.session.async_payment_succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CheckoutSessionAsyncPaymentSucceeded($handler)
    {
        $this->register('v1.checkout.session.async_payment_succeeded', $handler);
    }

    /**
     * Registers a handler for the "v1.checkout.session.completed" event.
     *
     * @param callable(Events\V1CheckoutSessionCompletedEvent, StripeClient): void $handler Handles v1.checkout.session.completed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CheckoutSessionCompleted($handler)
    {
        $this->register('v1.checkout.session.completed', $handler);
    }

    /**
     * Registers a handler for the "v1.checkout.session.expired" event.
     *
     * @param callable(Events\V1CheckoutSessionExpiredEvent, StripeClient): void $handler Handles v1.checkout.session.expired events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CheckoutSessionExpired($handler)
    {
        $this->register('v1.checkout.session.expired', $handler);
    }

    /**
     * Registers a handler for the "v1.climate.order.canceled" event.
     *
     * @param callable(Events\V1ClimateOrderCanceledEvent, StripeClient): void $handler Handles v1.climate.order.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ClimateOrderCanceled($handler)
    {
        $this->register('v1.climate.order.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.climate.order.created" event.
     *
     * @param callable(Events\V1ClimateOrderCreatedEvent, StripeClient): void $handler Handles v1.climate.order.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ClimateOrderCreated($handler)
    {
        $this->register('v1.climate.order.created', $handler);
    }

    /**
     * Registers a handler for the "v1.climate.order.delayed" event.
     *
     * @param callable(Events\V1ClimateOrderDelayedEvent, StripeClient): void $handler Handles v1.climate.order.delayed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ClimateOrderDelayed($handler)
    {
        $this->register('v1.climate.order.delayed', $handler);
    }

    /**
     * Registers a handler for the "v1.climate.order.delivered" event.
     *
     * @param callable(Events\V1ClimateOrderDeliveredEvent, StripeClient): void $handler Handles v1.climate.order.delivered events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ClimateOrderDelivered($handler)
    {
        $this->register('v1.climate.order.delivered', $handler);
    }

    /**
     * Registers a handler for the "v1.climate.order.product_substituted" event.
     *
     * @param callable(Events\V1ClimateOrderProductSubstitutedEvent, StripeClient): void $handler Handles v1.climate.order.product_substituted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ClimateOrderProductSubstituted($handler)
    {
        $this->register('v1.climate.order.product_substituted', $handler);
    }

    /**
     * Registers a handler for the "v1.climate.product.created" event.
     *
     * @param callable(Events\V1ClimateProductCreatedEvent, StripeClient): void $handler Handles v1.climate.product.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ClimateProductCreated($handler)
    {
        $this->register('v1.climate.product.created', $handler);
    }

    /**
     * Registers a handler for the "v1.climate.product.pricing_updated" event.
     *
     * @param callable(Events\V1ClimateProductPricingUpdatedEvent, StripeClient): void $handler Handles v1.climate.product.pricing_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ClimateProductPricingUpdated($handler)
    {
        $this->register('v1.climate.product.pricing_updated', $handler);
    }

    /**
     * Registers a handler for the "v1.coupon.created" event.
     *
     * @param callable(Events\V1CouponCreatedEvent, StripeClient): void $handler Handles v1.coupon.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CouponCreated($handler)
    {
        $this->register('v1.coupon.created', $handler);
    }

    /**
     * Registers a handler for the "v1.coupon.deleted" event.
     *
     * @param callable(Events\V1CouponDeletedEvent, StripeClient): void $handler Handles v1.coupon.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CouponDeleted($handler)
    {
        $this->register('v1.coupon.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.coupon.updated" event.
     *
     * @param callable(Events\V1CouponUpdatedEvent, StripeClient): void $handler Handles v1.coupon.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CouponUpdated($handler)
    {
        $this->register('v1.coupon.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.credit_note.created" event.
     *
     * @param callable(Events\V1CreditNoteCreatedEvent, StripeClient): void $handler Handles v1.credit_note.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CreditNoteCreated($handler)
    {
        $this->register('v1.credit_note.created', $handler);
    }

    /**
     * Registers a handler for the "v1.credit_note.updated" event.
     *
     * @param callable(Events\V1CreditNoteUpdatedEvent, StripeClient): void $handler Handles v1.credit_note.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CreditNoteUpdated($handler)
    {
        $this->register('v1.credit_note.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.credit_note.voided" event.
     *
     * @param callable(Events\V1CreditNoteVoidedEvent, StripeClient): void $handler Handles v1.credit_note.voided events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CreditNoteVoided($handler)
    {
        $this->register('v1.credit_note.voided', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.created" event.
     *
     * @param callable(Events\V1CustomerCreatedEvent, StripeClient): void $handler Handles v1.customer.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerCreated($handler)
    {
        $this->register('v1.customer.created', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.deleted" event.
     *
     * @param callable(Events\V1CustomerDeletedEvent, StripeClient): void $handler Handles v1.customer.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerDeleted($handler)
    {
        $this->register('v1.customer.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.subscription.created" event.
     *
     * @param callable(Events\V1CustomerSubscriptionCreatedEvent, StripeClient): void $handler Handles v1.customer.subscription.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionCreated($handler)
    {
        $this->register('v1.customer.subscription.created', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.subscription.deleted" event.
     *
     * @param callable(Events\V1CustomerSubscriptionDeletedEvent, StripeClient): void $handler Handles v1.customer.subscription.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionDeleted($handler)
    {
        $this->register('v1.customer.subscription.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.subscription.paused" event.
     *
     * @param callable(Events\V1CustomerSubscriptionPausedEvent, StripeClient): void $handler Handles v1.customer.subscription.paused events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionPaused($handler)
    {
        $this->register('v1.customer.subscription.paused', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.subscription.pending_update_applied" event.
     *
     * @param callable(Events\V1CustomerSubscriptionPendingUpdateAppliedEvent, StripeClient): void $handler Handles v1.customer.subscription.pending_update_applied events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionPendingUpdateApplied($handler)
    {
        $this->register(
            'v1.customer.subscription.pending_update_applied',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.customer.subscription.pending_update_expired" event.
     *
     * @param callable(Events\V1CustomerSubscriptionPendingUpdateExpiredEvent, StripeClient): void $handler Handles v1.customer.subscription.pending_update_expired events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionPendingUpdateExpired($handler)
    {
        $this->register(
            'v1.customer.subscription.pending_update_expired',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.customer.subscription.resumed" event.
     *
     * @param callable(Events\V1CustomerSubscriptionResumedEvent, StripeClient): void $handler Handles v1.customer.subscription.resumed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionResumed($handler)
    {
        $this->register('v1.customer.subscription.resumed', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.subscription.trial_will_end" event.
     *
     * @param callable(Events\V1CustomerSubscriptionTrialWillEndEvent, StripeClient): void $handler Handles v1.customer.subscription.trial_will_end events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionTrialWillEnd($handler)
    {
        $this->register('v1.customer.subscription.trial_will_end', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.subscription.updated" event.
     *
     * @param callable(Events\V1CustomerSubscriptionUpdatedEvent, StripeClient): void $handler Handles v1.customer.subscription.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerSubscriptionUpdated($handler)
    {
        $this->register('v1.customer.subscription.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.tax_id.created" event.
     *
     * @param callable(Events\V1CustomerTaxIdCreatedEvent, StripeClient): void $handler Handles v1.customer.tax_id.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerTaxIdCreated($handler)
    {
        $this->register('v1.customer.tax_id.created', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.tax_id.deleted" event.
     *
     * @param callable(Events\V1CustomerTaxIdDeletedEvent, StripeClient): void $handler Handles v1.customer.tax_id.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerTaxIdDeleted($handler)
    {
        $this->register('v1.customer.tax_id.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.tax_id.updated" event.
     *
     * @param callable(Events\V1CustomerTaxIdUpdatedEvent, StripeClient): void $handler Handles v1.customer.tax_id.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerTaxIdUpdated($handler)
    {
        $this->register('v1.customer.tax_id.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.updated" event.
     *
     * @param callable(Events\V1CustomerUpdatedEvent, StripeClient): void $handler Handles v1.customer.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerUpdated($handler)
    {
        $this->register('v1.customer.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.customer_cash_balance_transaction.created" event.
     *
     * @param callable(Events\V1CustomerCashBalanceTransactionCreatedEvent, StripeClient): void $handler Handles v1.customer_cash_balance_transaction.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerCashBalanceTransactionCreated($handler)
    {
        $this->register('v1.customer_cash_balance_transaction.created', $handler);
    }

    /**
     * Registers a handler for the "v1.entitlements.active_entitlement_summary.updated" event.
     *
     * @param callable(Events\V1EntitlementsActiveEntitlementSummaryUpdatedEvent, StripeClient): void $handler Handles v1.entitlements.active_entitlement_summary.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1EntitlementsActiveEntitlementSummaryUpdated($handler)
    {
        $this->register(
            'v1.entitlements.active_entitlement_summary.updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.file.created" event.
     *
     * @param callable(Events\V1FileCreatedEvent, StripeClient): void $handler Handles v1.file.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FileCreated($handler)
    {
        $this->register('v1.file.created', $handler);
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.created" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountCreatedEvent, StripeClient): void $handler Handles v1.financial_connections.account.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountCreated($handler)
    {
        $this->register('v1.financial_connections.account.created', $handler);
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.deactivated" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountDeactivatedEvent, StripeClient): void $handler Handles v1.financial_connections.account.deactivated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountDeactivated($handler)
    {
        $this->register('v1.financial_connections.account.deactivated', $handler);
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.disconnected" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountDisconnectedEvent, StripeClient): void $handler Handles v1.financial_connections.account.disconnected events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountDisconnected($handler)
    {
        $this->register('v1.financial_connections.account.disconnected', $handler);
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.reactivated" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountReactivatedEvent, StripeClient): void $handler Handles v1.financial_connections.account.reactivated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountReactivated($handler)
    {
        $this->register('v1.financial_connections.account.reactivated', $handler);
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.refreshed_balance" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountRefreshedBalanceEvent, StripeClient): void $handler Handles v1.financial_connections.account.refreshed_balance events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountRefreshedBalance($handler)
    {
        $this->register(
            'v1.financial_connections.account.refreshed_balance',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.refreshed_ownership" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountRefreshedOwnershipEvent, StripeClient): void $handler Handles v1.financial_connections.account.refreshed_ownership events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountRefreshedOwnership($handler)
    {
        $this->register(
            'v1.financial_connections.account.refreshed_ownership',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.refreshed_transactions" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountRefreshedTransactionsEvent, StripeClient): void $handler Handles v1.financial_connections.account.refreshed_transactions events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountRefreshedTransactions(
        $handler
    ) {
        $this->register(
            'v1.financial_connections.account.refreshed_transactions',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.identity.verification_session.canceled" event.
     *
     * @param callable(Events\V1IdentityVerificationSessionCanceledEvent, StripeClient): void $handler Handles v1.identity.verification_session.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IdentityVerificationSessionCanceled($handler)
    {
        $this->register('v1.identity.verification_session.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.identity.verification_session.created" event.
     *
     * @param callable(Events\V1IdentityVerificationSessionCreatedEvent, StripeClient): void $handler Handles v1.identity.verification_session.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IdentityVerificationSessionCreated($handler)
    {
        $this->register('v1.identity.verification_session.created', $handler);
    }

    /**
     * Registers a handler for the "v1.identity.verification_session.processing" event.
     *
     * @param callable(Events\V1IdentityVerificationSessionProcessingEvent, StripeClient): void $handler Handles v1.identity.verification_session.processing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IdentityVerificationSessionProcessing($handler)
    {
        $this->register('v1.identity.verification_session.processing', $handler);
    }

    /**
     * Registers a handler for the "v1.identity.verification_session.redacted" event.
     *
     * @param callable(Events\V1IdentityVerificationSessionRedactedEvent, StripeClient): void $handler Handles v1.identity.verification_session.redacted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IdentityVerificationSessionRedacted($handler)
    {
        $this->register('v1.identity.verification_session.redacted', $handler);
    }

    /**
     * Registers a handler for the "v1.identity.verification_session.requires_input" event.
     *
     * @param callable(Events\V1IdentityVerificationSessionRequiresInputEvent, StripeClient): void $handler Handles v1.identity.verification_session.requires_input events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IdentityVerificationSessionRequiresInput($handler)
    {
        $this->register(
            'v1.identity.verification_session.requires_input',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.identity.verification_session.verified" event.
     *
     * @param callable(Events\V1IdentityVerificationSessionVerifiedEvent, StripeClient): void $handler Handles v1.identity.verification_session.verified events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IdentityVerificationSessionVerified($handler)
    {
        $this->register('v1.identity.verification_session.verified', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.created" event.
     *
     * @param callable(Events\V1InvoiceCreatedEvent, StripeClient): void $handler Handles v1.invoice.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceCreated($handler)
    {
        $this->register('v1.invoice.created', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.deleted" event.
     *
     * @param callable(Events\V1InvoiceDeletedEvent, StripeClient): void $handler Handles v1.invoice.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceDeleted($handler)
    {
        $this->register('v1.invoice.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.finalization_failed" event.
     *
     * @param callable(Events\V1InvoiceFinalizationFailedEvent, StripeClient): void $handler Handles v1.invoice.finalization_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceFinalizationFailed($handler)
    {
        $this->register('v1.invoice.finalization_failed', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.finalized" event.
     *
     * @param callable(Events\V1InvoiceFinalizedEvent, StripeClient): void $handler Handles v1.invoice.finalized events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceFinalized($handler)
    {
        $this->register('v1.invoice.finalized', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.marked_uncollectible" event.
     *
     * @param callable(Events\V1InvoiceMarkedUncollectibleEvent, StripeClient): void $handler Handles v1.invoice.marked_uncollectible events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceMarkedUncollectible($handler)
    {
        $this->register('v1.invoice.marked_uncollectible', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.overdue" event.
     *
     * @param callable(Events\V1InvoiceOverdueEvent, StripeClient): void $handler Handles v1.invoice.overdue events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceOverdue($handler)
    {
        $this->register('v1.invoice.overdue', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.overpaid" event.
     *
     * @param callable(Events\V1InvoiceOverpaidEvent, StripeClient): void $handler Handles v1.invoice.overpaid events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceOverpaid($handler)
    {
        $this->register('v1.invoice.overpaid', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.paid" event.
     *
     * @param callable(Events\V1InvoicePaidEvent, StripeClient): void $handler Handles v1.invoice.paid events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoicePaid($handler)
    {
        $this->register('v1.invoice.paid', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.payment_action_required" event.
     *
     * @param callable(Events\V1InvoicePaymentActionRequiredEvent, StripeClient): void $handler Handles v1.invoice.payment_action_required events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoicePaymentActionRequired($handler)
    {
        $this->register('v1.invoice.payment_action_required', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.payment_failed" event.
     *
     * @param callable(Events\V1InvoicePaymentFailedEvent, StripeClient): void $handler Handles v1.invoice.payment_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoicePaymentFailed($handler)
    {
        $this->register('v1.invoice.payment_failed', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.payment_succeeded" event.
     *
     * @param callable(Events\V1InvoicePaymentSucceededEvent, StripeClient): void $handler Handles v1.invoice.payment_succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoicePaymentSucceeded($handler)
    {
        $this->register('v1.invoice.payment_succeeded', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.sent" event.
     *
     * @param callable(Events\V1InvoiceSentEvent, StripeClient): void $handler Handles v1.invoice.sent events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceSent($handler)
    {
        $this->register('v1.invoice.sent', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.upcoming" event.
     *
     * @param callable(Events\V1InvoiceUpcomingEvent, StripeClient): void $handler Handles v1.invoice.upcoming events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceUpcoming($handler)
    {
        $this->register('v1.invoice.upcoming', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.updated" event.
     *
     * @param callable(Events\V1InvoiceUpdatedEvent, StripeClient): void $handler Handles v1.invoice.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceUpdated($handler)
    {
        $this->register('v1.invoice.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.voided" event.
     *
     * @param callable(Events\V1InvoiceVoidedEvent, StripeClient): void $handler Handles v1.invoice.voided events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceVoided($handler)
    {
        $this->register('v1.invoice.voided', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.will_be_due" event.
     *
     * @param callable(Events\V1InvoiceWillBeDueEvent, StripeClient): void $handler Handles v1.invoice.will_be_due events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceWillBeDue($handler)
    {
        $this->register('v1.invoice.will_be_due', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice_payment.paid" event.
     *
     * @param callable(Events\V1InvoicePaymentPaidEvent, StripeClient): void $handler Handles v1.invoice_payment.paid events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoicePaymentPaid($handler)
    {
        $this->register('v1.invoice_payment.paid', $handler);
    }

    /**
     * Registers a handler for the "v1.invoiceitem.created" event.
     *
     * @param callable(Events\V1InvoiceitemCreatedEvent, StripeClient): void $handler Handles v1.invoiceitem.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceitemCreated($handler)
    {
        $this->register('v1.invoiceitem.created', $handler);
    }

    /**
     * Registers a handler for the "v1.invoiceitem.deleted" event.
     *
     * @param callable(Events\V1InvoiceitemDeletedEvent, StripeClient): void $handler Handles v1.invoiceitem.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoiceitemDeleted($handler)
    {
        $this->register('v1.invoiceitem.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_authorization.created" event.
     *
     * @param callable(Events\V1IssuingAuthorizationCreatedEvent, StripeClient): void $handler Handles v1.issuing_authorization.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingAuthorizationCreated($handler)
    {
        $this->register('v1.issuing_authorization.created', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_authorization.request" event.
     *
     * @param callable(Events\V1IssuingAuthorizationRequestEvent, StripeClient): void $handler Handles v1.issuing_authorization.request events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingAuthorizationRequest($handler)
    {
        $this->register('v1.issuing_authorization.request', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_authorization.updated" event.
     *
     * @param callable(Events\V1IssuingAuthorizationUpdatedEvent, StripeClient): void $handler Handles v1.issuing_authorization.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingAuthorizationUpdated($handler)
    {
        $this->register('v1.issuing_authorization.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_card.created" event.
     *
     * @param callable(Events\V1IssuingCardCreatedEvent, StripeClient): void $handler Handles v1.issuing_card.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingCardCreated($handler)
    {
        $this->register('v1.issuing_card.created', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_card.updated" event.
     *
     * @param callable(Events\V1IssuingCardUpdatedEvent, StripeClient): void $handler Handles v1.issuing_card.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingCardUpdated($handler)
    {
        $this->register('v1.issuing_card.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_cardholder.created" event.
     *
     * @param callable(Events\V1IssuingCardholderCreatedEvent, StripeClient): void $handler Handles v1.issuing_cardholder.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingCardholderCreated($handler)
    {
        $this->register('v1.issuing_cardholder.created', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_cardholder.updated" event.
     *
     * @param callable(Events\V1IssuingCardholderUpdatedEvent, StripeClient): void $handler Handles v1.issuing_cardholder.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingCardholderUpdated($handler)
    {
        $this->register('v1.issuing_cardholder.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_dispute.closed" event.
     *
     * @param callable(Events\V1IssuingDisputeClosedEvent, StripeClient): void $handler Handles v1.issuing_dispute.closed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingDisputeClosed($handler)
    {
        $this->register('v1.issuing_dispute.closed', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_dispute.created" event.
     *
     * @param callable(Events\V1IssuingDisputeCreatedEvent, StripeClient): void $handler Handles v1.issuing_dispute.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingDisputeCreated($handler)
    {
        $this->register('v1.issuing_dispute.created', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_dispute.funds_reinstated" event.
     *
     * @param callable(Events\V1IssuingDisputeFundsReinstatedEvent, StripeClient): void $handler Handles v1.issuing_dispute.funds_reinstated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingDisputeFundsReinstated($handler)
    {
        $this->register('v1.issuing_dispute.funds_reinstated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_dispute.funds_rescinded" event.
     *
     * @param callable(Events\V1IssuingDisputeFundsRescindedEvent, StripeClient): void $handler Handles v1.issuing_dispute.funds_rescinded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingDisputeFundsRescinded($handler)
    {
        $this->register('v1.issuing_dispute.funds_rescinded', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_dispute.submitted" event.
     *
     * @param callable(Events\V1IssuingDisputeSubmittedEvent, StripeClient): void $handler Handles v1.issuing_dispute.submitted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingDisputeSubmitted($handler)
    {
        $this->register('v1.issuing_dispute.submitted', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_dispute.updated" event.
     *
     * @param callable(Events\V1IssuingDisputeUpdatedEvent, StripeClient): void $handler Handles v1.issuing_dispute.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingDisputeUpdated($handler)
    {
        $this->register('v1.issuing_dispute.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_personalization_design.activated" event.
     *
     * @param callable(Events\V1IssuingPersonalizationDesignActivatedEvent, StripeClient): void $handler Handles v1.issuing_personalization_design.activated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingPersonalizationDesignActivated($handler)
    {
        $this->register('v1.issuing_personalization_design.activated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_personalization_design.deactivated" event.
     *
     * @param callable(Events\V1IssuingPersonalizationDesignDeactivatedEvent, StripeClient): void $handler Handles v1.issuing_personalization_design.deactivated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingPersonalizationDesignDeactivated($handler)
    {
        $this->register('v1.issuing_personalization_design.deactivated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_personalization_design.rejected" event.
     *
     * @param callable(Events\V1IssuingPersonalizationDesignRejectedEvent, StripeClient): void $handler Handles v1.issuing_personalization_design.rejected events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingPersonalizationDesignRejected($handler)
    {
        $this->register('v1.issuing_personalization_design.rejected', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_personalization_design.updated" event.
     *
     * @param callable(Events\V1IssuingPersonalizationDesignUpdatedEvent, StripeClient): void $handler Handles v1.issuing_personalization_design.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingPersonalizationDesignUpdated($handler)
    {
        $this->register('v1.issuing_personalization_design.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_token.created" event.
     *
     * @param callable(Events\V1IssuingTokenCreatedEvent, StripeClient): void $handler Handles v1.issuing_token.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingTokenCreated($handler)
    {
        $this->register('v1.issuing_token.created', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_token.updated" event.
     *
     * @param callable(Events\V1IssuingTokenUpdatedEvent, StripeClient): void $handler Handles v1.issuing_token.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingTokenUpdated($handler)
    {
        $this->register('v1.issuing_token.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_transaction.created" event.
     *
     * @param callable(Events\V1IssuingTransactionCreatedEvent, StripeClient): void $handler Handles v1.issuing_transaction.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingTransactionCreated($handler)
    {
        $this->register('v1.issuing_transaction.created', $handler);
    }

    /**
     * Registers a handler for the "v1.issuing_transaction.purchase_details_receipt_updated" event.
     *
     * @param callable(Events\V1IssuingTransactionPurchaseDetailsReceiptUpdatedEvent, StripeClient): void $handler Handles v1.issuing_transaction.purchase_details_receipt_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingTransactionPurchaseDetailsReceiptUpdated($handler)
    {
        $this->register(
            'v1.issuing_transaction.purchase_details_receipt_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.issuing_transaction.updated" event.
     *
     * @param callable(Events\V1IssuingTransactionUpdatedEvent, StripeClient): void $handler Handles v1.issuing_transaction.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1IssuingTransactionUpdated($handler)
    {
        $this->register('v1.issuing_transaction.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.mandate.updated" event.
     *
     * @param callable(Events\V1MandateUpdatedEvent, StripeClient): void $handler Handles v1.mandate.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1MandateUpdated($handler)
    {
        $this->register('v1.mandate.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.amount_capturable_updated" event.
     *
     * @param callable(Events\V1PaymentIntentAmountCapturableUpdatedEvent, StripeClient): void $handler Handles v1.payment_intent.amount_capturable_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentAmountCapturableUpdated($handler)
    {
        $this->register('v1.payment_intent.amount_capturable_updated', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.canceled" event.
     *
     * @param callable(Events\V1PaymentIntentCanceledEvent, StripeClient): void $handler Handles v1.payment_intent.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentCanceled($handler)
    {
        $this->register('v1.payment_intent.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.created" event.
     *
     * @param callable(Events\V1PaymentIntentCreatedEvent, StripeClient): void $handler Handles v1.payment_intent.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentCreated($handler)
    {
        $this->register('v1.payment_intent.created', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.partially_funded" event.
     *
     * @param callable(Events\V1PaymentIntentPartiallyFundedEvent, StripeClient): void $handler Handles v1.payment_intent.partially_funded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentPartiallyFunded($handler)
    {
        $this->register('v1.payment_intent.partially_funded', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.payment_failed" event.
     *
     * @param callable(Events\V1PaymentIntentPaymentFailedEvent, StripeClient): void $handler Handles v1.payment_intent.payment_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentPaymentFailed($handler)
    {
        $this->register('v1.payment_intent.payment_failed', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.processing" event.
     *
     * @param callable(Events\V1PaymentIntentProcessingEvent, StripeClient): void $handler Handles v1.payment_intent.processing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentProcessing($handler)
    {
        $this->register('v1.payment_intent.processing', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.requires_action" event.
     *
     * @param callable(Events\V1PaymentIntentRequiresActionEvent, StripeClient): void $handler Handles v1.payment_intent.requires_action events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentRequiresAction($handler)
    {
        $this->register('v1.payment_intent.requires_action', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_intent.succeeded" event.
     *
     * @param callable(Events\V1PaymentIntentSucceededEvent, StripeClient): void $handler Handles v1.payment_intent.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentIntentSucceeded($handler)
    {
        $this->register('v1.payment_intent.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_link.created" event.
     *
     * @param callable(Events\V1PaymentLinkCreatedEvent, StripeClient): void $handler Handles v1.payment_link.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentLinkCreated($handler)
    {
        $this->register('v1.payment_link.created', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_link.updated" event.
     *
     * @param callable(Events\V1PaymentLinkUpdatedEvent, StripeClient): void $handler Handles v1.payment_link.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentLinkUpdated($handler)
    {
        $this->register('v1.payment_link.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_method.attached" event.
     *
     * @param callable(Events\V1PaymentMethodAttachedEvent, StripeClient): void $handler Handles v1.payment_method.attached events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentMethodAttached($handler)
    {
        $this->register('v1.payment_method.attached', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_method.automatically_updated" event.
     *
     * @param callable(Events\V1PaymentMethodAutomaticallyUpdatedEvent, StripeClient): void $handler Handles v1.payment_method.automatically_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentMethodAutomaticallyUpdated($handler)
    {
        $this->register('v1.payment_method.automatically_updated', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_method.detached" event.
     *
     * @param callable(Events\V1PaymentMethodDetachedEvent, StripeClient): void $handler Handles v1.payment_method.detached events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentMethodDetached($handler)
    {
        $this->register('v1.payment_method.detached', $handler);
    }

    /**
     * Registers a handler for the "v1.payment_method.updated" event.
     *
     * @param callable(Events\V1PaymentMethodUpdatedEvent, StripeClient): void $handler Handles v1.payment_method.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PaymentMethodUpdated($handler)
    {
        $this->register('v1.payment_method.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.payout.canceled" event.
     *
     * @param callable(Events\V1PayoutCanceledEvent, StripeClient): void $handler Handles v1.payout.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PayoutCanceled($handler)
    {
        $this->register('v1.payout.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.payout.created" event.
     *
     * @param callable(Events\V1PayoutCreatedEvent, StripeClient): void $handler Handles v1.payout.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PayoutCreated($handler)
    {
        $this->register('v1.payout.created', $handler);
    }

    /**
     * Registers a handler for the "v1.payout.failed" event.
     *
     * @param callable(Events\V1PayoutFailedEvent, StripeClient): void $handler Handles v1.payout.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PayoutFailed($handler)
    {
        $this->register('v1.payout.failed', $handler);
    }

    /**
     * Registers a handler for the "v1.payout.paid" event.
     *
     * @param callable(Events\V1PayoutPaidEvent, StripeClient): void $handler Handles v1.payout.paid events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PayoutPaid($handler)
    {
        $this->register('v1.payout.paid', $handler);
    }

    /**
     * Registers a handler for the "v1.payout.reconciliation_completed" event.
     *
     * @param callable(Events\V1PayoutReconciliationCompletedEvent, StripeClient): void $handler Handles v1.payout.reconciliation_completed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PayoutReconciliationCompleted($handler)
    {
        $this->register('v1.payout.reconciliation_completed', $handler);
    }

    /**
     * Registers a handler for the "v1.payout.updated" event.
     *
     * @param callable(Events\V1PayoutUpdatedEvent, StripeClient): void $handler Handles v1.payout.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PayoutUpdated($handler)
    {
        $this->register('v1.payout.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.person.created" event.
     *
     * @param callable(Events\V1PersonCreatedEvent, StripeClient): void $handler Handles v1.person.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PersonCreated($handler)
    {
        $this->register('v1.person.created', $handler);
    }

    /**
     * Registers a handler for the "v1.person.deleted" event.
     *
     * @param callable(Events\V1PersonDeletedEvent, StripeClient): void $handler Handles v1.person.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PersonDeleted($handler)
    {
        $this->register('v1.person.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.person.updated" event.
     *
     * @param callable(Events\V1PersonUpdatedEvent, StripeClient): void $handler Handles v1.person.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PersonUpdated($handler)
    {
        $this->register('v1.person.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.plan.created" event.
     *
     * @param callable(Events\V1PlanCreatedEvent, StripeClient): void $handler Handles v1.plan.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PlanCreated($handler)
    {
        $this->register('v1.plan.created', $handler);
    }

    /**
     * Registers a handler for the "v1.plan.deleted" event.
     *
     * @param callable(Events\V1PlanDeletedEvent, StripeClient): void $handler Handles v1.plan.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PlanDeleted($handler)
    {
        $this->register('v1.plan.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.plan.updated" event.
     *
     * @param callable(Events\V1PlanUpdatedEvent, StripeClient): void $handler Handles v1.plan.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PlanUpdated($handler)
    {
        $this->register('v1.plan.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.price.created" event.
     *
     * @param callable(Events\V1PriceCreatedEvent, StripeClient): void $handler Handles v1.price.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PriceCreated($handler)
    {
        $this->register('v1.price.created', $handler);
    }

    /**
     * Registers a handler for the "v1.price.deleted" event.
     *
     * @param callable(Events\V1PriceDeletedEvent, StripeClient): void $handler Handles v1.price.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PriceDeleted($handler)
    {
        $this->register('v1.price.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.price.updated" event.
     *
     * @param callable(Events\V1PriceUpdatedEvent, StripeClient): void $handler Handles v1.price.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PriceUpdated($handler)
    {
        $this->register('v1.price.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.product.created" event.
     *
     * @param callable(Events\V1ProductCreatedEvent, StripeClient): void $handler Handles v1.product.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ProductCreated($handler)
    {
        $this->register('v1.product.created', $handler);
    }

    /**
     * Registers a handler for the "v1.product.deleted" event.
     *
     * @param callable(Events\V1ProductDeletedEvent, StripeClient): void $handler Handles v1.product.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ProductDeleted($handler)
    {
        $this->register('v1.product.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.product.updated" event.
     *
     * @param callable(Events\V1ProductUpdatedEvent, StripeClient): void $handler Handles v1.product.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ProductUpdated($handler)
    {
        $this->register('v1.product.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.promotion_code.created" event.
     *
     * @param callable(Events\V1PromotionCodeCreatedEvent, StripeClient): void $handler Handles v1.promotion_code.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PromotionCodeCreated($handler)
    {
        $this->register('v1.promotion_code.created', $handler);
    }

    /**
     * Registers a handler for the "v1.promotion_code.updated" event.
     *
     * @param callable(Events\V1PromotionCodeUpdatedEvent, StripeClient): void $handler Handles v1.promotion_code.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1PromotionCodeUpdated($handler)
    {
        $this->register('v1.promotion_code.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.quote.accepted" event.
     *
     * @param callable(Events\V1QuoteAcceptedEvent, StripeClient): void $handler Handles v1.quote.accepted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1QuoteAccepted($handler)
    {
        $this->register('v1.quote.accepted', $handler);
    }

    /**
     * Registers a handler for the "v1.quote.canceled" event.
     *
     * @param callable(Events\V1QuoteCanceledEvent, StripeClient): void $handler Handles v1.quote.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1QuoteCanceled($handler)
    {
        $this->register('v1.quote.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.quote.created" event.
     *
     * @param callable(Events\V1QuoteCreatedEvent, StripeClient): void $handler Handles v1.quote.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1QuoteCreated($handler)
    {
        $this->register('v1.quote.created', $handler);
    }

    /**
     * Registers a handler for the "v1.quote.finalized" event.
     *
     * @param callable(Events\V1QuoteFinalizedEvent, StripeClient): void $handler Handles v1.quote.finalized events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1QuoteFinalized($handler)
    {
        $this->register('v1.quote.finalized', $handler);
    }

    /**
     * Registers a handler for the "v1.radar.early_fraud_warning.created" event.
     *
     * @param callable(Events\V1RadarEarlyFraudWarningCreatedEvent, StripeClient): void $handler Handles v1.radar.early_fraud_warning.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1RadarEarlyFraudWarningCreated($handler)
    {
        $this->register('v1.radar.early_fraud_warning.created', $handler);
    }

    /**
     * Registers a handler for the "v1.radar.early_fraud_warning.updated" event.
     *
     * @param callable(Events\V1RadarEarlyFraudWarningUpdatedEvent, StripeClient): void $handler Handles v1.radar.early_fraud_warning.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1RadarEarlyFraudWarningUpdated($handler)
    {
        $this->register('v1.radar.early_fraud_warning.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.refund.created" event.
     *
     * @param callable(Events\V1RefundCreatedEvent, StripeClient): void $handler Handles v1.refund.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1RefundCreated($handler)
    {
        $this->register('v1.refund.created', $handler);
    }

    /**
     * Registers a handler for the "v1.refund.failed" event.
     *
     * @param callable(Events\V1RefundFailedEvent, StripeClient): void $handler Handles v1.refund.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1RefundFailed($handler)
    {
        $this->register('v1.refund.failed', $handler);
    }

    /**
     * Registers a handler for the "v1.refund.updated" event.
     *
     * @param callable(Events\V1RefundUpdatedEvent, StripeClient): void $handler Handles v1.refund.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1RefundUpdated($handler)
    {
        $this->register('v1.refund.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.review.closed" event.
     *
     * @param callable(Events\V1ReviewClosedEvent, StripeClient): void $handler Handles v1.review.closed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ReviewClosed($handler)
    {
        $this->register('v1.review.closed', $handler);
    }

    /**
     * Registers a handler for the "v1.review.opened" event.
     *
     * @param callable(Events\V1ReviewOpenedEvent, StripeClient): void $handler Handles v1.review.opened events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1ReviewOpened($handler)
    {
        $this->register('v1.review.opened', $handler);
    }

    /**
     * Registers a handler for the "v1.setup_intent.canceled" event.
     *
     * @param callable(Events\V1SetupIntentCanceledEvent, StripeClient): void $handler Handles v1.setup_intent.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SetupIntentCanceled($handler)
    {
        $this->register('v1.setup_intent.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.setup_intent.created" event.
     *
     * @param callable(Events\V1SetupIntentCreatedEvent, StripeClient): void $handler Handles v1.setup_intent.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SetupIntentCreated($handler)
    {
        $this->register('v1.setup_intent.created', $handler);
    }

    /**
     * Registers a handler for the "v1.setup_intent.requires_action" event.
     *
     * @param callable(Events\V1SetupIntentRequiresActionEvent, StripeClient): void $handler Handles v1.setup_intent.requires_action events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SetupIntentRequiresAction($handler)
    {
        $this->register('v1.setup_intent.requires_action', $handler);
    }

    /**
     * Registers a handler for the "v1.setup_intent.setup_failed" event.
     *
     * @param callable(Events\V1SetupIntentSetupFailedEvent, StripeClient): void $handler Handles v1.setup_intent.setup_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SetupIntentSetupFailed($handler)
    {
        $this->register('v1.setup_intent.setup_failed', $handler);
    }

    /**
     * Registers a handler for the "v1.setup_intent.succeeded" event.
     *
     * @param callable(Events\V1SetupIntentSucceededEvent, StripeClient): void $handler Handles v1.setup_intent.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SetupIntentSucceeded($handler)
    {
        $this->register('v1.setup_intent.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v1.sigma.scheduled_query_run.created" event.
     *
     * @param callable(Events\V1SigmaScheduledQueryRunCreatedEvent, StripeClient): void $handler Handles v1.sigma.scheduled_query_run.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SigmaScheduledQueryRunCreated($handler)
    {
        $this->register('v1.sigma.scheduled_query_run.created', $handler);
    }

    /**
     * Registers a handler for the "v1.source.canceled" event.
     *
     * @param callable(Events\V1SourceCanceledEvent, StripeClient): void $handler Handles v1.source.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SourceCanceled($handler)
    {
        $this->register('v1.source.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.source.chargeable" event.
     *
     * @param callable(Events\V1SourceChargeableEvent, StripeClient): void $handler Handles v1.source.chargeable events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SourceChargeable($handler)
    {
        $this->register('v1.source.chargeable', $handler);
    }

    /**
     * Registers a handler for the "v1.source.failed" event.
     *
     * @param callable(Events\V1SourceFailedEvent, StripeClient): void $handler Handles v1.source.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SourceFailed($handler)
    {
        $this->register('v1.source.failed', $handler);
    }

    /**
     * Registers a handler for the "v1.source.refund_attributes_required" event.
     *
     * @param callable(Events\V1SourceRefundAttributesRequiredEvent, StripeClient): void $handler Handles v1.source.refund_attributes_required events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SourceRefundAttributesRequired($handler)
    {
        $this->register('v1.source.refund_attributes_required', $handler);
    }

    /**
     * Registers a handler for the "v1.subscription_schedule.aborted" event.
     *
     * @param callable(Events\V1SubscriptionScheduleAbortedEvent, StripeClient): void $handler Handles v1.subscription_schedule.aborted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SubscriptionScheduleAborted($handler)
    {
        $this->register('v1.subscription_schedule.aborted', $handler);
    }

    /**
     * Registers a handler for the "v1.subscription_schedule.canceled" event.
     *
     * @param callable(Events\V1SubscriptionScheduleCanceledEvent, StripeClient): void $handler Handles v1.subscription_schedule.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SubscriptionScheduleCanceled($handler)
    {
        $this->register('v1.subscription_schedule.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.subscription_schedule.completed" event.
     *
     * @param callable(Events\V1SubscriptionScheduleCompletedEvent, StripeClient): void $handler Handles v1.subscription_schedule.completed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SubscriptionScheduleCompleted($handler)
    {
        $this->register('v1.subscription_schedule.completed', $handler);
    }

    /**
     * Registers a handler for the "v1.subscription_schedule.created" event.
     *
     * @param callable(Events\V1SubscriptionScheduleCreatedEvent, StripeClient): void $handler Handles v1.subscription_schedule.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SubscriptionScheduleCreated($handler)
    {
        $this->register('v1.subscription_schedule.created', $handler);
    }

    /**
     * Registers a handler for the "v1.subscription_schedule.expiring" event.
     *
     * @param callable(Events\V1SubscriptionScheduleExpiringEvent, StripeClient): void $handler Handles v1.subscription_schedule.expiring events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SubscriptionScheduleExpiring($handler)
    {
        $this->register('v1.subscription_schedule.expiring', $handler);
    }

    /**
     * Registers a handler for the "v1.subscription_schedule.released" event.
     *
     * @param callable(Events\V1SubscriptionScheduleReleasedEvent, StripeClient): void $handler Handles v1.subscription_schedule.released events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SubscriptionScheduleReleased($handler)
    {
        $this->register('v1.subscription_schedule.released', $handler);
    }

    /**
     * Registers a handler for the "v1.subscription_schedule.updated" event.
     *
     * @param callable(Events\V1SubscriptionScheduleUpdatedEvent, StripeClient): void $handler Handles v1.subscription_schedule.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1SubscriptionScheduleUpdated($handler)
    {
        $this->register('v1.subscription_schedule.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.tax.settings.updated" event.
     *
     * @param callable(Events\V1TaxSettingsUpdatedEvent, StripeClient): void $handler Handles v1.tax.settings.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TaxSettingsUpdated($handler)
    {
        $this->register('v1.tax.settings.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.tax_rate.created" event.
     *
     * @param callable(Events\V1TaxRateCreatedEvent, StripeClient): void $handler Handles v1.tax_rate.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TaxRateCreated($handler)
    {
        $this->register('v1.tax_rate.created', $handler);
    }

    /**
     * Registers a handler for the "v1.tax_rate.updated" event.
     *
     * @param callable(Events\V1TaxRateUpdatedEvent, StripeClient): void $handler Handles v1.tax_rate.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TaxRateUpdated($handler)
    {
        $this->register('v1.tax_rate.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.terminal.reader.action_failed" event.
     *
     * @param callable(Events\V1TerminalReaderActionFailedEvent, StripeClient): void $handler Handles v1.terminal.reader.action_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TerminalReaderActionFailed($handler)
    {
        $this->register('v1.terminal.reader.action_failed', $handler);
    }

    /**
     * Registers a handler for the "v1.terminal.reader.action_succeeded" event.
     *
     * @param callable(Events\V1TerminalReaderActionSucceededEvent, StripeClient): void $handler Handles v1.terminal.reader.action_succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TerminalReaderActionSucceeded($handler)
    {
        $this->register('v1.terminal.reader.action_succeeded', $handler);
    }

    /**
     * Registers a handler for the "v1.terminal.reader.action_updated" event.
     *
     * @param callable(Events\V1TerminalReaderActionUpdatedEvent, StripeClient): void $handler Handles v1.terminal.reader.action_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TerminalReaderActionUpdated($handler)
    {
        $this->register('v1.terminal.reader.action_updated', $handler);
    }

    /**
     * Registers a handler for the "v1.test_helpers.test_clock.advancing" event.
     *
     * @param callable(Events\V1TestHelpersTestClockAdvancingEvent, StripeClient): void $handler Handles v1.test_helpers.test_clock.advancing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TestHelpersTestClockAdvancing($handler)
    {
        $this->register('v1.test_helpers.test_clock.advancing', $handler);
    }

    /**
     * Registers a handler for the "v1.test_helpers.test_clock.created" event.
     *
     * @param callable(Events\V1TestHelpersTestClockCreatedEvent, StripeClient): void $handler Handles v1.test_helpers.test_clock.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TestHelpersTestClockCreated($handler)
    {
        $this->register('v1.test_helpers.test_clock.created', $handler);
    }

    /**
     * Registers a handler for the "v1.test_helpers.test_clock.deleted" event.
     *
     * @param callable(Events\V1TestHelpersTestClockDeletedEvent, StripeClient): void $handler Handles v1.test_helpers.test_clock.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TestHelpersTestClockDeleted($handler)
    {
        $this->register('v1.test_helpers.test_clock.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.test_helpers.test_clock.internal_failure" event.
     *
     * @param callable(Events\V1TestHelpersTestClockInternalFailureEvent, StripeClient): void $handler Handles v1.test_helpers.test_clock.internal_failure events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TestHelpersTestClockInternalFailure($handler)
    {
        $this->register('v1.test_helpers.test_clock.internal_failure', $handler);
    }

    /**
     * Registers a handler for the "v1.test_helpers.test_clock.ready" event.
     *
     * @param callable(Events\V1TestHelpersTestClockReadyEvent, StripeClient): void $handler Handles v1.test_helpers.test_clock.ready events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TestHelpersTestClockReady($handler)
    {
        $this->register('v1.test_helpers.test_clock.ready', $handler);
    }

    /**
     * Registers a handler for the "v1.topup.canceled" event.
     *
     * @param callable(Events\V1TopupCanceledEvent, StripeClient): void $handler Handles v1.topup.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TopupCanceled($handler)
    {
        $this->register('v1.topup.canceled', $handler);
    }

    /**
     * Registers a handler for the "v1.topup.created" event.
     *
     * @param callable(Events\V1TopupCreatedEvent, StripeClient): void $handler Handles v1.topup.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TopupCreated($handler)
    {
        $this->register('v1.topup.created', $handler);
    }

    /**
     * Registers a handler for the "v1.topup.failed" event.
     *
     * @param callable(Events\V1TopupFailedEvent, StripeClient): void $handler Handles v1.topup.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TopupFailed($handler)
    {
        $this->register('v1.topup.failed', $handler);
    }

    /**
     * Registers a handler for the "v1.topup.reversed" event.
     *
     * @param callable(Events\V1TopupReversedEvent, StripeClient): void $handler Handles v1.topup.reversed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TopupReversed($handler)
    {
        $this->register('v1.topup.reversed', $handler);
    }

    /**
     * Registers a handler for the "v1.topup.succeeded" event.
     *
     * @param callable(Events\V1TopupSucceededEvent, StripeClient): void $handler Handles v1.topup.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TopupSucceeded($handler)
    {
        $this->register('v1.topup.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v1.transfer.created" event.
     *
     * @param callable(Events\V1TransferCreatedEvent, StripeClient): void $handler Handles v1.transfer.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TransferCreated($handler)
    {
        $this->register('v1.transfer.created', $handler);
    }

    /**
     * Registers a handler for the "v1.transfer.reversed" event.
     *
     * @param callable(Events\V1TransferReversedEvent, StripeClient): void $handler Handles v1.transfer.reversed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TransferReversed($handler)
    {
        $this->register('v1.transfer.reversed', $handler);
    }

    /**
     * Registers a handler for the "v1.transfer.updated" event.
     *
     * @param callable(Events\V1TransferUpdatedEvent, StripeClient): void $handler Handles v1.transfer.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TransferUpdated($handler)
    {
        $this->register('v1.transfer.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.cadence.billed" event.
     *
     * @param callable(Events\V2BillingCadenceBilledEvent, StripeClient): void $handler Handles v2.billing.cadence.billed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingCadenceBilled($handler)
    {
        $this->register('v2.billing.cadence.billed', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.cadence.canceled" event.
     *
     * @param callable(Events\V2BillingCadenceCanceledEvent, StripeClient): void $handler Handles v2.billing.cadence.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingCadenceCanceled($handler)
    {
        $this->register('v2.billing.cadence.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.cadence.created" event.
     *
     * @param callable(Events\V2BillingCadenceCreatedEvent, StripeClient): void $handler Handles v2.billing.cadence.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingCadenceCreated($handler)
    {
        $this->register('v2.billing.cadence.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.license_fee.created" event.
     *
     * @param callable(Events\V2BillingLicenseFeeCreatedEvent, StripeClient): void $handler Handles v2.billing.license_fee.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingLicenseFeeCreated($handler)
    {
        $this->register('v2.billing.license_fee.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.license_fee.updated" event.
     *
     * @param callable(Events\V2BillingLicenseFeeUpdatedEvent, StripeClient): void $handler Handles v2.billing.license_fee.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingLicenseFeeUpdated($handler)
    {
        $this->register('v2.billing.license_fee.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.license_fee_version.created" event.
     *
     * @param callable(Events\V2BillingLicenseFeeVersionCreatedEvent, StripeClient): void $handler Handles v2.billing.license_fee_version.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingLicenseFeeVersionCreated($handler)
    {
        $this->register('v2.billing.license_fee_version.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.licensed_item.created" event.
     *
     * @param callable(Events\V2BillingLicensedItemCreatedEvent, StripeClient): void $handler Handles v2.billing.licensed_item.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingLicensedItemCreated($handler)
    {
        $this->register('v2.billing.licensed_item.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.licensed_item.updated" event.
     *
     * @param callable(Events\V2BillingLicensedItemUpdatedEvent, StripeClient): void $handler Handles v2.billing.licensed_item.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingLicensedItemUpdated($handler)
    {
        $this->register('v2.billing.licensed_item.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.metered_item.created" event.
     *
     * @param callable(Events\V2BillingMeteredItemCreatedEvent, StripeClient): void $handler Handles v2.billing.metered_item.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingMeteredItemCreated($handler)
    {
        $this->register('v2.billing.metered_item.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.metered_item.updated" event.
     *
     * @param callable(Events\V2BillingMeteredItemUpdatedEvent, StripeClient): void $handler Handles v2.billing.metered_item.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingMeteredItemUpdated($handler)
    {
        $this->register('v2.billing.metered_item.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan.created" event.
     *
     * @param callable(Events\V2BillingPricingPlanCreatedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanCreated($handler)
    {
        $this->register('v2.billing.pricing_plan.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan.updated" event.
     *
     * @param callable(Events\V2BillingPricingPlanUpdatedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanUpdated($handler)
    {
        $this->register('v2.billing.pricing_plan.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_component.created" event.
     *
     * @param callable(Events\V2BillingPricingPlanComponentCreatedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_component.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanComponentCreated($handler)
    {
        $this->register('v2.billing.pricing_plan_component.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_component.updated" event.
     *
     * @param callable(Events\V2BillingPricingPlanComponentUpdatedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_component.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanComponentUpdated($handler)
    {
        $this->register('v2.billing.pricing_plan_component.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.collection_awaiting_customer_action" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionCollectionAwaitingCustomerActionEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.collection_awaiting_customer_action events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionCollectionAwaitingCustomerAction(
        $handler
    ) {
        $this->register(
            'v2.billing.pricing_plan_subscription.collection_awaiting_customer_action',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.collection_current" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionCollectionCurrentEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.collection_current events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionCollectionCurrent($handler)
    {
        $this->register(
            'v2.billing.pricing_plan_subscription.collection_current',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.collection_past_due" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionCollectionPastDueEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.collection_past_due events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionCollectionPastDue($handler)
    {
        $this->register(
            'v2.billing.pricing_plan_subscription.collection_past_due',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.collection_paused" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionCollectionPausedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.collection_paused events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionCollectionPaused($handler)
    {
        $this->register(
            'v2.billing.pricing_plan_subscription.collection_paused',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.collection_unpaid" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionCollectionUnpaidEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.collection_unpaid events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionCollectionUnpaid($handler)
    {
        $this->register(
            'v2.billing.pricing_plan_subscription.collection_unpaid',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.servicing_activated" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionServicingActivatedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.servicing_activated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionServicingActivated(
        $handler
    ) {
        $this->register(
            'v2.billing.pricing_plan_subscription.servicing_activated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.servicing_canceled" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionServicingCanceledEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.servicing_canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionServicingCanceled($handler)
    {
        $this->register(
            'v2.billing.pricing_plan_subscription.servicing_canceled',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_subscription.servicing_paused" event.
     *
     * @param callable(Events\V2BillingPricingPlanSubscriptionServicingPausedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_subscription.servicing_paused events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanSubscriptionServicingPaused($handler)
    {
        $this->register(
            'v2.billing.pricing_plan_subscription.servicing_paused',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.pricing_plan_version.created" event.
     *
     * @param callable(Events\V2BillingPricingPlanVersionCreatedEvent, StripeClient): void $handler Handles v2.billing.pricing_plan_version.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingPricingPlanVersionCreated($handler)
    {
        $this->register('v2.billing.pricing_plan_version.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.rate_card.created" event.
     *
     * @param callable(Events\V2BillingRateCardCreatedEvent, StripeClient): void $handler Handles v2.billing.rate_card.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardCreated($handler)
    {
        $this->register('v2.billing.rate_card.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.rate_card.updated" event.
     *
     * @param callable(Events\V2BillingRateCardUpdatedEvent, StripeClient): void $handler Handles v2.billing.rate_card.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardUpdated($handler)
    {
        $this->register('v2.billing.rate_card.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_custom_pricing_unit_overage_rate.created" event.
     *
     * @param callable(Events\V2BillingRateCardCustomPricingUnitOverageRateCreatedEvent, StripeClient): void $handler Handles v2.billing.rate_card_custom_pricing_unit_overage_rate.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardCustomPricingUnitOverageRateCreated(
        $handler
    ) {
        $this->register(
            'v2.billing.rate_card_custom_pricing_unit_overage_rate.created',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_rate.created" event.
     *
     * @param callable(Events\V2BillingRateCardRateCreatedEvent, StripeClient): void $handler Handles v2.billing.rate_card_rate.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardRateCreated($handler)
    {
        $this->register('v2.billing.rate_card_rate.created', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.activated" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionActivatedEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.activated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionActivated($handler)
    {
        $this->register('v2.billing.rate_card_subscription.activated', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.canceled" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionCanceledEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionCanceled($handler)
    {
        $this->register('v2.billing.rate_card_subscription.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.collection_awaiting_customer_action" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionCollectionAwaitingCustomerActionEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.collection_awaiting_customer_action events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionCollectionAwaitingCustomerAction(
        $handler
    ) {
        $this->register(
            'v2.billing.rate_card_subscription.collection_awaiting_customer_action',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.collection_current" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionCollectionCurrentEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.collection_current events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionCollectionCurrent($handler)
    {
        $this->register(
            'v2.billing.rate_card_subscription.collection_current',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.collection_past_due" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionCollectionPastDueEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.collection_past_due events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionCollectionPastDue($handler)
    {
        $this->register(
            'v2.billing.rate_card_subscription.collection_past_due',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.collection_paused" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionCollectionPausedEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.collection_paused events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionCollectionPaused($handler)
    {
        $this->register(
            'v2.billing.rate_card_subscription.collection_paused',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.collection_unpaid" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionCollectionUnpaidEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.collection_unpaid events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionCollectionUnpaid($handler)
    {
        $this->register(
            'v2.billing.rate_card_subscription.collection_unpaid',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.servicing_activated" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionServicingActivatedEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.servicing_activated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionServicingActivated($handler)
    {
        $this->register(
            'v2.billing.rate_card_subscription.servicing_activated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.servicing_canceled" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionServicingCanceledEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.servicing_canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionServicingCanceled($handler)
    {
        $this->register(
            'v2.billing.rate_card_subscription.servicing_canceled',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_subscription.servicing_paused" event.
     *
     * @param callable(Events\V2BillingRateCardSubscriptionServicingPausedEvent, StripeClient): void $handler Handles v2.billing.rate_card_subscription.servicing_paused events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardSubscriptionServicingPaused($handler)
    {
        $this->register(
            'v2.billing.rate_card_subscription.servicing_paused',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.billing.rate_card_version.created" event.
     *
     * @param callable(Events\V2BillingRateCardVersionCreatedEvent, StripeClient): void $handler Handles v2.billing.rate_card_version.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2BillingRateCardVersionCreated($handler)
    {
        $this->register('v2.billing.rate_card_version.created', $handler);
    }

    /**
     * Registers a handler for the "v2.commerce.product_catalog.imports.failed" event.
     *
     * @param callable(Events\V2CommerceProductCatalogImportsFailedEvent, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CommerceProductCatalogImportsFailed($handler)
    {
        $this->register('v2.commerce.product_catalog.imports.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.commerce.product_catalog.imports.processing" event.
     *
     * @param callable(Events\V2CommerceProductCatalogImportsProcessingEvent, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.processing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CommerceProductCatalogImportsProcessing($handler)
    {
        $this->register('v2.commerce.product_catalog.imports.processing', $handler);
    }

    /**
     * Registers a handler for the "v2.commerce.product_catalog.imports.succeeded" event.
     *
     * @param callable(Events\V2CommerceProductCatalogImportsSucceededEvent, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CommerceProductCatalogImportsSucceeded($handler)
    {
        $this->register('v2.commerce.product_catalog.imports.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.commerce.product_catalog.imports.succeeded_with_errors" event.
     *
     * @param callable(Events\V2CommerceProductCatalogImportsSucceededWithErrorsEvent, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.succeeded_with_errors events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CommerceProductCatalogImportsSucceededWithErrors(
        $handler
    ) {
        $this->register(
            'v2.commerce.product_catalog.imports.succeeded_with_errors',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account.closed" event.
     *
     * @param callable(Events\V2CoreAccountClosedEvent, StripeClient): void $handler Handles v2.core.account.closed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountClosed($handler)
    {
        $this->register('v2.core.account.closed', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account.created" event.
     *
     * @param callable(Events\V2CoreAccountCreatedEvent, StripeClient): void $handler Handles v2.core.account.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountCreated($handler)
    {
        $this->register('v2.core.account.created', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account.updated" event.
     *
     * @param callable(Events\V2CoreAccountUpdatedEvent, StripeClient): void $handler Handles v2.core.account.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountUpdated($handler)
    {
        $this->register('v2.core.account.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.card_creator].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.card_creator].capability_status_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationCardCreatorCapabilityStatusUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.card_creator].capability_status_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.card_creator].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationCardCreatorUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.card_creator].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationCardCreatorUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.card_creator].updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.customer].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.customer].capability_status_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.customer].capability_status_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.customer].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.customer].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationCustomerUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.customer].updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.merchant].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.merchant].capability_status_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.merchant].capability_status_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.merchant].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.merchant].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationMerchantUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.merchant].updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.recipient].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.recipient].capability_status_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.recipient].capability_status_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.recipient].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.recipient].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationRecipientUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.recipient].updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.storer].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.storer].capability_status_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.storer].capability_status_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.storer].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationStorerUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.storer].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationStorerUpdated($handler)
    {
        $this->register('v2.core.account[configuration.storer].updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[defaults].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingDefaultsUpdatedEvent, StripeClient): void $handler Handles v2.core.account[defaults].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingDefaultsUpdated($handler)
    {
        $this->register('v2.core.account[defaults].updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[future_requirements].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingFutureRequirementsUpdatedEvent, StripeClient): void $handler Handles v2.core.account[future_requirements].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingFutureRequirementsUpdated($handler)
    {
        $this->register('v2.core.account[future_requirements].updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[identity].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingIdentityUpdatedEvent, StripeClient): void $handler Handles v2.core.account[identity].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingIdentityUpdated($handler)
    {
        $this->register('v2.core.account[identity].updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[requirements].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingRequirementsUpdatedEvent, StripeClient): void $handler Handles v2.core.account[requirements].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingRequirementsUpdated($handler)
    {
        $this->register('v2.core.account[requirements].updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account_link.returned" event.
     *
     * @param callable(Events\V2CoreAccountLinkReturnedEvent, StripeClient): void $handler Handles v2.core.account_link.returned events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountLinkReturned($handler)
    {
        $this->register('v2.core.account_link.returned', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account_person.created" event.
     *
     * @param callable(Events\V2CoreAccountPersonCreatedEvent, StripeClient): void $handler Handles v2.core.account_person.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountPersonCreated($handler)
    {
        $this->register('v2.core.account_person.created', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account_person.deleted" event.
     *
     * @param callable(Events\V2CoreAccountPersonDeletedEvent, StripeClient): void $handler Handles v2.core.account_person.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountPersonDeleted($handler)
    {
        $this->register('v2.core.account_person.deleted', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account_person.updated" event.
     *
     * @param callable(Events\V2CoreAccountPersonUpdatedEvent, StripeClient): void $handler Handles v2.core.account_person.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountPersonUpdated($handler)
    {
        $this->register('v2.core.account_person.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account_signals.fraudulent_website_ready" event.
     *
     * @param callable(Events\V2CoreAccountSignalsFraudulentWebsiteReadyEvent, StripeClient): void $handler Handles v2.core.account_signals.fraudulent_website_ready events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountSignalsFraudulentWebsiteReady($handler)
    {
        $this->register(
            'v2.core.account_signals.fraudulent_website_ready',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.approval_request.approved" event.
     *
     * @param callable(Events\V2CoreApprovalRequestApprovedEvent, StripeClient): void $handler Handles v2.core.approval_request.approved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreApprovalRequestApproved($handler)
    {
        $this->register('v2.core.approval_request.approved', $handler);
    }

    /**
     * Registers a handler for the "v2.core.approval_request.canceled" event.
     *
     * @param callable(Events\V2CoreApprovalRequestCanceledEvent, StripeClient): void $handler Handles v2.core.approval_request.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreApprovalRequestCanceled($handler)
    {
        $this->register('v2.core.approval_request.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.core.approval_request.created" event.
     *
     * @param callable(Events\V2CoreApprovalRequestCreatedEvent, StripeClient): void $handler Handles v2.core.approval_request.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreApprovalRequestCreated($handler)
    {
        $this->register('v2.core.approval_request.created', $handler);
    }

    /**
     * Registers a handler for the "v2.core.approval_request.expired" event.
     *
     * @param callable(Events\V2CoreApprovalRequestExpiredEvent, StripeClient): void $handler Handles v2.core.approval_request.expired events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreApprovalRequestExpired($handler)
    {
        $this->register('v2.core.approval_request.expired', $handler);
    }

    /**
     * Registers a handler for the "v2.core.approval_request.failed" event.
     *
     * @param callable(Events\V2CoreApprovalRequestFailedEvent, StripeClient): void $handler Handles v2.core.approval_request.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreApprovalRequestFailed($handler)
    {
        $this->register('v2.core.approval_request.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.core.approval_request.rejected" event.
     *
     * @param callable(Events\V2CoreApprovalRequestRejectedEvent, StripeClient): void $handler Handles v2.core.approval_request.rejected events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreApprovalRequestRejected($handler)
    {
        $this->register('v2.core.approval_request.rejected', $handler);
    }

    /**
     * Registers a handler for the "v2.core.approval_request.succeeded" event.
     *
     * @param callable(Events\V2CoreApprovalRequestSucceededEvent, StripeClient): void $handler Handles v2.core.approval_request.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreApprovalRequestSucceeded($handler)
    {
        $this->register('v2.core.approval_request.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.batch_failed" event.
     *
     * @param callable(Events\V2CoreBatchJobBatchFailedEvent, StripeClient): void $handler Handles v2.core.batch_job.batch_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobBatchFailed($handler)
    {
        $this->register('v2.core.batch_job.batch_failed', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.canceled" event.
     *
     * @param callable(Events\V2CoreBatchJobCanceledEvent, StripeClient): void $handler Handles v2.core.batch_job.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobCanceled($handler)
    {
        $this->register('v2.core.batch_job.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.completed" event.
     *
     * @param callable(Events\V2CoreBatchJobCompletedEvent, StripeClient): void $handler Handles v2.core.batch_job.completed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobCompleted($handler)
    {
        $this->register('v2.core.batch_job.completed', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.created" event.
     *
     * @param callable(Events\V2CoreBatchJobCreatedEvent, StripeClient): void $handler Handles v2.core.batch_job.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobCreated($handler)
    {
        $this->register('v2.core.batch_job.created', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.ready_for_upload" event.
     *
     * @param callable(Events\V2CoreBatchJobReadyForUploadEvent, StripeClient): void $handler Handles v2.core.batch_job.ready_for_upload events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobReadyForUpload($handler)
    {
        $this->register('v2.core.batch_job.ready_for_upload', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.timeout" event.
     *
     * @param callable(Events\V2CoreBatchJobTimeoutEvent, StripeClient): void $handler Handles v2.core.batch_job.timeout events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobTimeout($handler)
    {
        $this->register('v2.core.batch_job.timeout', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.updated" event.
     *
     * @param callable(Events\V2CoreBatchJobUpdatedEvent, StripeClient): void $handler Handles v2.core.batch_job.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobUpdated($handler)
    {
        $this->register('v2.core.batch_job.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.upload_timeout" event.
     *
     * @param callable(Events\V2CoreBatchJobUploadTimeoutEvent, StripeClient): void $handler Handles v2.core.batch_job.upload_timeout events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobUploadTimeout($handler)
    {
        $this->register('v2.core.batch_job.upload_timeout', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.validating" event.
     *
     * @param callable(Events\V2CoreBatchJobValidatingEvent, StripeClient): void $handler Handles v2.core.batch_job.validating events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobValidating($handler)
    {
        $this->register('v2.core.batch_job.validating', $handler);
    }

    /**
     * Registers a handler for the "v2.core.batch_job.validation_failed" event.
     *
     * @param callable(Events\V2CoreBatchJobValidationFailedEvent, StripeClient): void $handler Handles v2.core.batch_job.validation_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreBatchJobValidationFailed($handler)
    {
        $this->register('v2.core.batch_job.validation_failed', $handler);
    }

    /**
     * Registers a handler for the "v2.core.claimable_sandbox.claimed" event.
     *
     * @param callable(Events\V2CoreClaimableSandboxClaimedEvent, StripeClient): void $handler Handles v2.core.claimable_sandbox.claimed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreClaimableSandboxClaimed($handler)
    {
        $this->register('v2.core.claimable_sandbox.claimed', $handler);
    }

    /**
     * Registers a handler for the "v2.core.claimable_sandbox.created" event.
     *
     * @param callable(Events\V2CoreClaimableSandboxCreatedEvent, StripeClient): void $handler Handles v2.core.claimable_sandbox.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreClaimableSandboxCreated($handler)
    {
        $this->register('v2.core.claimable_sandbox.created', $handler);
    }

    /**
     * Registers a handler for the "v2.core.claimable_sandbox.expired" event.
     *
     * @param callable(Events\V2CoreClaimableSandboxExpiredEvent, StripeClient): void $handler Handles v2.core.claimable_sandbox.expired events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreClaimableSandboxExpired($handler)
    {
        $this->register('v2.core.claimable_sandbox.expired', $handler);
    }

    /**
     * Registers a handler for the "v2.core.claimable_sandbox.expiring" event.
     *
     * @param callable(Events\V2CoreClaimableSandboxExpiringEvent, StripeClient): void $handler Handles v2.core.claimable_sandbox.expiring events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreClaimableSandboxExpiring($handler)
    {
        $this->register('v2.core.claimable_sandbox.expiring', $handler);
    }

    /**
     * Registers a handler for the "v2.core.claimable_sandbox.updated" event.
     *
     * @param callable(Events\V2CoreClaimableSandboxUpdatedEvent, StripeClient): void $handler Handles v2.core.claimable_sandbox.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreClaimableSandboxUpdated($handler)
    {
        $this->register('v2.core.claimable_sandbox.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.event_destination.ping" event.
     *
     * @param callable(Events\V2CoreEventDestinationPingEvent, StripeClient): void $handler Handles v2.core.event_destination.ping events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreEventDestinationPing($handler)
    {
        $this->register('v2.core.event_destination.ping', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.api_error.firing" event.
     *
     * @param callable(Events\V2CoreHealthApiErrorFiringEvent, StripeClient): void $handler Handles v2.core.health.api_error.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthApiErrorFiring($handler)
    {
        $this->register('v2.core.health.api_error.firing', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.api_error.resolved" event.
     *
     * @param callable(Events\V2CoreHealthApiErrorResolvedEvent, StripeClient): void $handler Handles v2.core.health.api_error.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthApiErrorResolved($handler)
    {
        $this->register('v2.core.health.api_error.resolved', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.api_latency.firing" event.
     *
     * @param callable(Events\V2CoreHealthApiLatencyFiringEvent, StripeClient): void $handler Handles v2.core.health.api_latency.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthApiLatencyFiring($handler)
    {
        $this->register('v2.core.health.api_latency.firing', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.api_latency.resolved" event.
     *
     * @param callable(Events\V2CoreHealthApiLatencyResolvedEvent, StripeClient): void $handler Handles v2.core.health.api_latency.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthApiLatencyResolved($handler)
    {
        $this->register('v2.core.health.api_latency.resolved', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.authorization_rate_drop.firing" event.
     *
     * @param callable(Events\V2CoreHealthAuthorizationRateDropFiringEvent, StripeClient): void $handler Handles v2.core.health.authorization_rate_drop.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthAuthorizationRateDropFiring($handler)
    {
        $this->register('v2.core.health.authorization_rate_drop.firing', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.authorization_rate_drop.resolved" event.
     *
     * @param callable(Events\V2CoreHealthAuthorizationRateDropResolvedEvent, StripeClient): void $handler Handles v2.core.health.authorization_rate_drop.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthAuthorizationRateDropResolved($handler)
    {
        $this->register(
            'v2.core.health.authorization_rate_drop.resolved',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.event_generation_failure.resolved" event.
     *
     * @param callable(Events\V2CoreHealthEventGenerationFailureResolvedEvent, StripeClient): void $handler Handles v2.core.health.event_generation_failure.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthEventGenerationFailureResolved($handler)
    {
        $this->register(
            'v2.core.health.event_generation_failure.resolved',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.fraud_rate.increased" event.
     *
     * @param callable(Events\V2CoreHealthFraudRateIncreasedEvent, StripeClient): void $handler Handles v2.core.health.fraud_rate.increased events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthFraudRateIncreased($handler)
    {
        $this->register('v2.core.health.fraud_rate.increased', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.issuing_authorization_request_errors.firing" event.
     *
     * @param callable(Events\V2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent, StripeClient): void $handler Handles v2.core.health.issuing_authorization_request_errors.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthIssuingAuthorizationRequestErrorsFiring(
        $handler
    ) {
        $this->register(
            'v2.core.health.issuing_authorization_request_errors.firing',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.issuing_authorization_request_errors.resolved" event.
     *
     * @param callable(Events\V2CoreHealthIssuingAuthorizationRequestErrorsResolvedEvent, StripeClient): void $handler Handles v2.core.health.issuing_authorization_request_errors.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthIssuingAuthorizationRequestErrorsResolved(
        $handler
    ) {
        $this->register(
            'v2.core.health.issuing_authorization_request_errors.resolved',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.issuing_authorization_request_timeout.firing" event.
     *
     * @param callable(Events\V2CoreHealthIssuingAuthorizationRequestTimeoutFiringEvent, StripeClient): void $handler Handles v2.core.health.issuing_authorization_request_timeout.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthIssuingAuthorizationRequestTimeoutFiring(
        $handler
    ) {
        $this->register(
            'v2.core.health.issuing_authorization_request_timeout.firing',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.issuing_authorization_request_timeout.resolved" event.
     *
     * @param callable(Events\V2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent, StripeClient): void $handler Handles v2.core.health.issuing_authorization_request_timeout.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthIssuingAuthorizationRequestTimeoutResolved(
        $handler
    ) {
        $this->register(
            'v2.core.health.issuing_authorization_request_timeout.resolved',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.meter_event_summaries_delayed.firing" event.
     *
     * @param callable(Events\V2CoreHealthMeterEventSummariesDelayedFiringEvent, StripeClient): void $handler Handles v2.core.health.meter_event_summaries_delayed.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthMeterEventSummariesDelayedFiring($handler)
    {
        $this->register(
            'v2.core.health.meter_event_summaries_delayed.firing',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.meter_event_summaries_delayed.resolved" event.
     *
     * @param callable(Events\V2CoreHealthMeterEventSummariesDelayedResolvedEvent, StripeClient): void $handler Handles v2.core.health.meter_event_summaries_delayed.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthMeterEventSummariesDelayedResolved($handler)
    {
        $this->register(
            'v2.core.health.meter_event_summaries_delayed.resolved',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.health.payment_method_error.firing" event.
     *
     * @param callable(Events\V2CoreHealthPaymentMethodErrorFiringEvent, StripeClient): void $handler Handles v2.core.health.payment_method_error.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthPaymentMethodErrorFiring($handler)
    {
        $this->register('v2.core.health.payment_method_error.firing', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.payment_method_error.resolved" event.
     *
     * @param callable(Events\V2CoreHealthPaymentMethodErrorResolvedEvent, StripeClient): void $handler Handles v2.core.health.payment_method_error.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthPaymentMethodErrorResolved($handler)
    {
        $this->register('v2.core.health.payment_method_error.resolved', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.sepa_debit_delayed.firing" event.
     *
     * @param callable(Events\V2CoreHealthSepaDebitDelayedFiringEvent, StripeClient): void $handler Handles v2.core.health.sepa_debit_delayed.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthSepaDebitDelayedFiring($handler)
    {
        $this->register('v2.core.health.sepa_debit_delayed.firing', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.sepa_debit_delayed.resolved" event.
     *
     * @param callable(Events\V2CoreHealthSepaDebitDelayedResolvedEvent, StripeClient): void $handler Handles v2.core.health.sepa_debit_delayed.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthSepaDebitDelayedResolved($handler)
    {
        $this->register('v2.core.health.sepa_debit_delayed.resolved', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.traffic_volume_drop.firing" event.
     *
     * @param callable(Events\V2CoreHealthTrafficVolumeDropFiringEvent, StripeClient): void $handler Handles v2.core.health.traffic_volume_drop.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthTrafficVolumeDropFiring($handler)
    {
        $this->register('v2.core.health.traffic_volume_drop.firing', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.traffic_volume_drop.resolved" event.
     *
     * @param callable(Events\V2CoreHealthTrafficVolumeDropResolvedEvent, StripeClient): void $handler Handles v2.core.health.traffic_volume_drop.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthTrafficVolumeDropResolved($handler)
    {
        $this->register('v2.core.health.traffic_volume_drop.resolved', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.webhook_latency.firing" event.
     *
     * @param callable(Events\V2CoreHealthWebhookLatencyFiringEvent, StripeClient): void $handler Handles v2.core.health.webhook_latency.firing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthWebhookLatencyFiring($handler)
    {
        $this->register('v2.core.health.webhook_latency.firing', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.webhook_latency.resolved" event.
     *
     * @param callable(Events\V2CoreHealthWebhookLatencyResolvedEvent, StripeClient): void $handler Handles v2.core.health.webhook_latency.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreHealthWebhookLatencyResolved($handler)
    {
        $this->register('v2.core.health.webhook_latency.resolved', $handler);
    }

    /**
     * Registers a handler for the "v2.data.reporting.query_run.created" event.
     *
     * @param callable(Events\V2DataReportingQueryRunCreatedEvent, StripeClient): void $handler Handles v2.data.reporting.query_run.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2DataReportingQueryRunCreated($handler)
    {
        $this->register('v2.data.reporting.query_run.created', $handler);
    }

    /**
     * Registers a handler for the "v2.data.reporting.query_run.failed" event.
     *
     * @param callable(Events\V2DataReportingQueryRunFailedEvent, StripeClient): void $handler Handles v2.data.reporting.query_run.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2DataReportingQueryRunFailed($handler)
    {
        $this->register('v2.data.reporting.query_run.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.data.reporting.query_run.succeeded" event.
     *
     * @param callable(Events\V2DataReportingQueryRunSucceededEvent, StripeClient): void $handler Handles v2.data.reporting.query_run.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2DataReportingQueryRunSucceeded($handler)
    {
        $this->register('v2.data.reporting.query_run.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.data.reporting.query_run.updated" event.
     *
     * @param callable(Events\V2DataReportingQueryRunUpdatedEvent, StripeClient): void $handler Handles v2.data.reporting.query_run.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2DataReportingQueryRunUpdated($handler)
    {
        $this->register('v2.data.reporting.query_run.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.extend.extension_run.failed" event.
     *
     * @param callable(Events\V2ExtendExtensionRunFailedEvent, StripeClient): void $handler Handles v2.extend.extension_run.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ExtendExtensionRunFailed($handler)
    {
        $this->register('v2.extend.extension_run.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.extend.workflow_run.failed" event.
     *
     * @param callable(Events\V2ExtendWorkflowRunFailedEvent, StripeClient): void $handler Handles v2.extend.workflow_run.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ExtendWorkflowRunFailed($handler)
    {
        $this->register('v2.extend.workflow_run.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.extend.workflow_run.started" event.
     *
     * @param callable(Events\V2ExtendWorkflowRunStartedEvent, StripeClient): void $handler Handles v2.extend.workflow_run.started events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ExtendWorkflowRunStarted($handler)
    {
        $this->register('v2.extend.workflow_run.started', $handler);
    }

    /**
     * Registers a handler for the "v2.extend.workflow_run.succeeded" event.
     *
     * @param callable(Events\V2ExtendWorkflowRunSucceededEvent, StripeClient): void $handler Handles v2.extend.workflow_run.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ExtendWorkflowRunSucceeded($handler)
    {
        $this->register('v2.extend.workflow_run.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.api_key.created" event.
     *
     * @param callable(Events\V2IamApiKeyCreatedEvent, StripeClient): void $handler Handles v2.iam.api_key.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamApiKeyCreated($handler)
    {
        $this->register('v2.iam.api_key.created', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.api_key.default_secret_revealed" event.
     *
     * @param callable(Events\V2IamApiKeyDefaultSecretRevealedEvent, StripeClient): void $handler Handles v2.iam.api_key.default_secret_revealed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamApiKeyDefaultSecretRevealed($handler)
    {
        $this->register('v2.iam.api_key.default_secret_revealed', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.api_key.expired" event.
     *
     * @param callable(Events\V2IamApiKeyExpiredEvent, StripeClient): void $handler Handles v2.iam.api_key.expired events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamApiKeyExpired($handler)
    {
        $this->register('v2.iam.api_key.expired', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.api_key.permissions_updated" event.
     *
     * @param callable(Events\V2IamApiKeyPermissionsUpdatedEvent, StripeClient): void $handler Handles v2.iam.api_key.permissions_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamApiKeyPermissionsUpdated($handler)
    {
        $this->register('v2.iam.api_key.permissions_updated', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.api_key.rotated" event.
     *
     * @param callable(Events\V2IamApiKeyRotatedEvent, StripeClient): void $handler Handles v2.iam.api_key.rotated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamApiKeyRotated($handler)
    {
        $this->register('v2.iam.api_key.rotated', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.api_key.updated" event.
     *
     * @param callable(Events\V2IamApiKeyUpdatedEvent, StripeClient): void $handler Handles v2.iam.api_key.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamApiKeyUpdated($handler)
    {
        $this->register('v2.iam.api_key.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.stripe_access_grant.approved" event.
     *
     * @param callable(Events\V2IamStripeAccessGrantApprovedEvent, StripeClient): void $handler Handles v2.iam.stripe_access_grant.approved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamStripeAccessGrantApproved($handler)
    {
        $this->register('v2.iam.stripe_access_grant.approved', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.stripe_access_grant.canceled" event.
     *
     * @param callable(Events\V2IamStripeAccessGrantCanceledEvent, StripeClient): void $handler Handles v2.iam.stripe_access_grant.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamStripeAccessGrantCanceled($handler)
    {
        $this->register('v2.iam.stripe_access_grant.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.stripe_access_grant.denied" event.
     *
     * @param callable(Events\V2IamStripeAccessGrantDeniedEvent, StripeClient): void $handler Handles v2.iam.stripe_access_grant.denied events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamStripeAccessGrantDenied($handler)
    {
        $this->register('v2.iam.stripe_access_grant.denied', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.stripe_access_grant.removed" event.
     *
     * @param callable(Events\V2IamStripeAccessGrantRemovedEvent, StripeClient): void $handler Handles v2.iam.stripe_access_grant.removed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamStripeAccessGrantRemoved($handler)
    {
        $this->register('v2.iam.stripe_access_grant.removed', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.stripe_access_grant.requested" event.
     *
     * @param callable(Events\V2IamStripeAccessGrantRequestedEvent, StripeClient): void $handler Handles v2.iam.stripe_access_grant.requested events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamStripeAccessGrantRequested($handler)
    {
        $this->register('v2.iam.stripe_access_grant.requested', $handler);
    }

    /**
     * Registers a handler for the "v2.iam.stripe_access_grant.updated" event.
     *
     * @param callable(Events\V2IamStripeAccessGrantUpdatedEvent, StripeClient): void $handler Handles v2.iam.stripe_access_grant.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2IamStripeAccessGrantUpdated($handler)
    {
        $this->register('v2.iam.stripe_access_grant.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.adjustment.created" event.
     *
     * @param callable(Events\V2MoneyManagementAdjustmentCreatedEvent, StripeClient): void $handler Handles v2.money_management.adjustment.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementAdjustmentCreated($handler)
    {
        $this->register('v2.money_management.adjustment.created', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.financial_account.created" event.
     *
     * @param callable(Events\V2MoneyManagementFinancialAccountCreatedEvent, StripeClient): void $handler Handles v2.money_management.financial_account.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementFinancialAccountCreated($handler)
    {
        $this->register('v2.money_management.financial_account.created', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.financial_account.updated" event.
     *
     * @param callable(Events\V2MoneyManagementFinancialAccountUpdatedEvent, StripeClient): void $handler Handles v2.money_management.financial_account.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementFinancialAccountUpdated($handler)
    {
        $this->register('v2.money_management.financial_account.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.financial_address.activated" event.
     *
     * @param callable(Events\V2MoneyManagementFinancialAddressActivatedEvent, StripeClient): void $handler Handles v2.money_management.financial_address.activated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementFinancialAddressActivated($handler)
    {
        $this->register(
            'v2.money_management.financial_address.activated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.financial_address.failed" event.
     *
     * @param callable(Events\V2MoneyManagementFinancialAddressFailedEvent, StripeClient): void $handler Handles v2.money_management.financial_address.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementFinancialAddressFailed($handler)
    {
        $this->register('v2.money_management.financial_address.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.inbound_transfer.available" event.
     *
     * @param callable(Events\V2MoneyManagementInboundTransferAvailableEvent, StripeClient): void $handler Handles v2.money_management.inbound_transfer.available events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementInboundTransferAvailable($handler)
    {
        $this->register('v2.money_management.inbound_transfer.available', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.inbound_transfer.bank_debit_failed" event.
     *
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitFailedEvent, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementInboundTransferBankDebitFailed($handler)
    {
        $this->register(
            'v2.money_management.inbound_transfer.bank_debit_failed',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.inbound_transfer.bank_debit_processing" event.
     *
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitProcessingEvent, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_processing events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementInboundTransferBankDebitProcessing(
        $handler
    ) {
        $this->register(
            'v2.money_management.inbound_transfer.bank_debit_processing',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.inbound_transfer.bank_debit_queued" event.
     *
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitQueuedEvent, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_queued events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementInboundTransferBankDebitQueued($handler)
    {
        $this->register(
            'v2.money_management.inbound_transfer.bank_debit_queued',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.inbound_transfer.bank_debit_returned" event.
     *
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitReturnedEvent, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_returned events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementInboundTransferBankDebitReturned($handler)
    {
        $this->register(
            'v2.money_management.inbound_transfer.bank_debit_returned',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.inbound_transfer.bank_debit_succeeded" event.
     *
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitSucceededEvent, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementInboundTransferBankDebitSucceeded(
        $handler
    ) {
        $this->register(
            'v2.money_management.inbound_transfer.bank_debit_succeeded',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.canceled" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentCanceledEvent, StripeClient): void $handler Handles v2.money_management.outbound_payment.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentCanceled($handler)
    {
        $this->register('v2.money_management.outbound_payment.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.created" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentCreatedEvent, StripeClient): void $handler Handles v2.money_management.outbound_payment.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentCreated($handler)
    {
        $this->register('v2.money_management.outbound_payment.created', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.failed" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentFailedEvent, StripeClient): void $handler Handles v2.money_management.outbound_payment.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentFailed($handler)
    {
        $this->register('v2.money_management.outbound_payment.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.posted" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentPostedEvent, StripeClient): void $handler Handles v2.money_management.outbound_payment.posted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentPosted($handler)
    {
        $this->register('v2.money_management.outbound_payment.posted', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.returned" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentReturnedEvent, StripeClient): void $handler Handles v2.money_management.outbound_payment.returned events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentReturned($handler)
    {
        $this->register('v2.money_management.outbound_payment.returned', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.updated" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentUpdatedEvent, StripeClient): void $handler Handles v2.money_management.outbound_payment.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentUpdated($handler)
    {
        $this->register('v2.money_management.outbound_payment.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.canceled" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferCanceledEvent, StripeClient): void $handler Handles v2.money_management.outbound_transfer.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferCanceled($handler)
    {
        $this->register('v2.money_management.outbound_transfer.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.created" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferCreatedEvent, StripeClient): void $handler Handles v2.money_management.outbound_transfer.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferCreated($handler)
    {
        $this->register('v2.money_management.outbound_transfer.created', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.failed" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferFailedEvent, StripeClient): void $handler Handles v2.money_management.outbound_transfer.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferFailed($handler)
    {
        $this->register('v2.money_management.outbound_transfer.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.posted" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferPostedEvent, StripeClient): void $handler Handles v2.money_management.outbound_transfer.posted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferPosted($handler)
    {
        $this->register('v2.money_management.outbound_transfer.posted', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.returned" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferReturnedEvent, StripeClient): void $handler Handles v2.money_management.outbound_transfer.returned events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferReturned($handler)
    {
        $this->register('v2.money_management.outbound_transfer.returned', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.updated" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferUpdatedEvent, StripeClient): void $handler Handles v2.money_management.outbound_transfer.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferUpdated($handler)
    {
        $this->register('v2.money_management.outbound_transfer.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.payout_method.created" event.
     *
     * @param callable(Events\V2MoneyManagementPayoutMethodCreatedEvent, StripeClient): void $handler Handles v2.money_management.payout_method.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementPayoutMethodCreated($handler)
    {
        $this->register('v2.money_management.payout_method.created', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.payout_method.updated" event.
     *
     * @param callable(Events\V2MoneyManagementPayoutMethodUpdatedEvent, StripeClient): void $handler Handles v2.money_management.payout_method.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementPayoutMethodUpdated($handler)
    {
        $this->register('v2.money_management.payout_method.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_credit.available" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedCreditAvailableEvent, StripeClient): void $handler Handles v2.money_management.received_credit.available events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedCreditAvailable($handler)
    {
        $this->register('v2.money_management.received_credit.available', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_credit.failed" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedCreditFailedEvent, StripeClient): void $handler Handles v2.money_management.received_credit.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedCreditFailed($handler)
    {
        $this->register('v2.money_management.received_credit.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_credit.returned" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedCreditReturnedEvent, StripeClient): void $handler Handles v2.money_management.received_credit.returned events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedCreditReturned($handler)
    {
        $this->register('v2.money_management.received_credit.returned', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_credit.succeeded" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedCreditSucceededEvent, StripeClient): void $handler Handles v2.money_management.received_credit.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedCreditSucceeded($handler)
    {
        $this->register('v2.money_management.received_credit.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_debit.canceled" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedDebitCanceledEvent, StripeClient): void $handler Handles v2.money_management.received_debit.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedDebitCanceled($handler)
    {
        $this->register('v2.money_management.received_debit.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_debit.failed" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedDebitFailedEvent, StripeClient): void $handler Handles v2.money_management.received_debit.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedDebitFailed($handler)
    {
        $this->register('v2.money_management.received_debit.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_debit.pending" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedDebitPendingEvent, StripeClient): void $handler Handles v2.money_management.received_debit.pending events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedDebitPending($handler)
    {
        $this->register('v2.money_management.received_debit.pending', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_debit.succeeded" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedDebitSucceededEvent, StripeClient): void $handler Handles v2.money_management.received_debit.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedDebitSucceeded($handler)
    {
        $this->register('v2.money_management.received_debit.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.received_debit.updated" event.
     *
     * @param callable(Events\V2MoneyManagementReceivedDebitUpdatedEvent, StripeClient): void $handler Handles v2.money_management.received_debit.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementReceivedDebitUpdated($handler)
    {
        $this->register('v2.money_management.received_debit.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.recipient_verification.created" event.
     *
     * @param callable(Events\V2MoneyManagementRecipientVerificationCreatedEvent, StripeClient): void $handler Handles v2.money_management.recipient_verification.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementRecipientVerificationCreated($handler)
    {
        $this->register(
            'v2.money_management.recipient_verification.created',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.recipient_verification.updated" event.
     *
     * @param callable(Events\V2MoneyManagementRecipientVerificationUpdatedEvent, StripeClient): void $handler Handles v2.money_management.recipient_verification.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementRecipientVerificationUpdated($handler)
    {
        $this->register(
            'v2.money_management.recipient_verification.updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.transaction.created" event.
     *
     * @param callable(Events\V2MoneyManagementTransactionCreatedEvent, StripeClient): void $handler Handles v2.money_management.transaction.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementTransactionCreated($handler)
    {
        $this->register('v2.money_management.transaction.created', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.transaction.updated" event.
     *
     * @param callable(Events\V2MoneyManagementTransactionUpdatedEvent, StripeClient): void $handler Handles v2.money_management.transaction.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementTransactionUpdated($handler)
    {
        $this->register('v2.money_management.transaction.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.orchestrated_commerce.agreement.confirmed" event.
     *
     * @param callable(Events\V2OrchestratedCommerceAgreementConfirmedEvent, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.confirmed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2OrchestratedCommerceAgreementConfirmed($handler)
    {
        $this->register('v2.orchestrated_commerce.agreement.confirmed', $handler);
    }

    /**
     * Registers a handler for the "v2.orchestrated_commerce.agreement.created" event.
     *
     * @param callable(Events\V2OrchestratedCommerceAgreementCreatedEvent, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2OrchestratedCommerceAgreementCreated($handler)
    {
        $this->register('v2.orchestrated_commerce.agreement.created', $handler);
    }

    /**
     * Registers a handler for the "v2.orchestrated_commerce.agreement.partially_confirmed" event.
     *
     * @param callable(Events\V2OrchestratedCommerceAgreementPartiallyConfirmedEvent, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.partially_confirmed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2OrchestratedCommerceAgreementPartiallyConfirmed($handler)
    {
        $this->register(
            'v2.orchestrated_commerce.agreement.partially_confirmed',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.orchestrated_commerce.agreement.terminated" event.
     *
     * @param callable(Events\V2OrchestratedCommerceAgreementTerminatedEvent, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.terminated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2OrchestratedCommerceAgreementTerminated($handler)
    {
        $this->register('v2.orchestrated_commerce.agreement.terminated', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.attempt_failed" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentAttemptFailedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.attempt_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentAttemptFailed($handler)
    {
        $this->register('v2.payments.off_session_payment.attempt_failed', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.attempt_started" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentAttemptStartedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.attempt_started events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentAttemptStarted($handler)
    {
        $this->register(
            'v2.payments.off_session_payment.attempt_started',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.authorization_attempt_failed" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentAuthorizationAttemptFailedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.authorization_attempt_failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentAuthorizationAttemptFailed(
        $handler
    ) {
        $this->register(
            'v2.payments.off_session_payment.authorization_attempt_failed',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.authorization_attempt_started" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentAuthorizationAttemptStartedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.authorization_attempt_started events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentAuthorizationAttemptStarted(
        $handler
    ) {
        $this->register(
            'v2.payments.off_session_payment.authorization_attempt_started',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.canceled" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentCanceledEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentCanceled($handler)
    {
        $this->register('v2.payments.off_session_payment.canceled', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.created" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentCreatedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentCreated($handler)
    {
        $this->register('v2.payments.off_session_payment.created', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.failed" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentFailedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentFailed($handler)
    {
        $this->register('v2.payments.off_session_payment.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.paused" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentPausedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.paused events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentPaused($handler)
    {
        $this->register('v2.payments.off_session_payment.paused', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.requires_capture" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentRequiresCaptureEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.requires_capture events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentRequiresCapture($handler)
    {
        $this->register(
            'v2.payments.off_session_payment.requires_capture',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.resumed" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentResumedEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.resumed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentResumed($handler)
    {
        $this->register('v2.payments.off_session_payment.resumed', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.off_session_payment.succeeded" event.
     *
     * @param callable(Events\V2PaymentsOffSessionPaymentSucceededEvent, StripeClient): void $handler Handles v2.payments.off_session_payment.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsOffSessionPaymentSucceeded($handler)
    {
        $this->register('v2.payments.off_session_payment.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.canceled" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentCanceledEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentCanceled($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent.canceled',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.created" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentCreatedEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentCreated($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent.created',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.errored" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentErroredEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.errored events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentErrored($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent.errored',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.funds_not_received" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentFundsNotReceivedEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.funds_not_received events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentFundsNotReceived(
        $handler
    ) {
        $this->register(
            'v2.payments.settlement_allocation_intent.funds_not_received',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.matched" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentMatchedEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.matched events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentMatched($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent.matched',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.not_found" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentNotFoundEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.not_found events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentNotFound($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent.not_found',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.settled" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentSettledEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.settled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentSettled($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent.settled',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent.submitted" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentSubmittedEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent.submitted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentSubmitted($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent.submitted',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent_split.canceled" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentSplitCanceledEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent_split.canceled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentSplitCanceled($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent_split.canceled',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent_split.created" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentSplitCreatedEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent_split.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentSplitCreated($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent_split.created',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.payments.settlement_allocation_intent_split.settled" event.
     *
     * @param callable(Events\V2PaymentsSettlementAllocationIntentSplitSettledEvent, StripeClient): void $handler Handles v2.payments.settlement_allocation_intent_split.settled events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2PaymentsSettlementAllocationIntentSplitSettled($handler)
    {
        $this->register(
            'v2.payments.settlement_allocation_intent_split.settled',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.reporting.report_run.created" event.
     *
     * @param callable(Events\V2ReportingReportRunCreatedEvent, StripeClient): void $handler Handles v2.reporting.report_run.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ReportingReportRunCreated($handler)
    {
        $this->register('v2.reporting.report_run.created', $handler);
    }

    /**
     * Registers a handler for the "v2.reporting.report_run.failed" event.
     *
     * @param callable(Events\V2ReportingReportRunFailedEvent, StripeClient): void $handler Handles v2.reporting.report_run.failed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ReportingReportRunFailed($handler)
    {
        $this->register('v2.reporting.report_run.failed', $handler);
    }

    /**
     * Registers a handler for the "v2.reporting.report_run.succeeded" event.
     *
     * @param callable(Events\V2ReportingReportRunSucceededEvent, StripeClient): void $handler Handles v2.reporting.report_run.succeeded events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ReportingReportRunSucceeded($handler)
    {
        $this->register('v2.reporting.report_run.succeeded', $handler);
    }

    /**
     * Registers a handler for the "v2.reporting.report_run.updated" event.
     *
     * @param callable(Events\V2ReportingReportRunUpdatedEvent, StripeClient): void $handler Handles v2.reporting.report_run.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2ReportingReportRunUpdated($handler)
    {
        $this->register('v2.reporting.report_run.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.signals.account_signal.fraudulent_merchant_ready" event.
     *
     * @param callable(Events\V2SignalsAccountSignalFraudulentMerchantReadyEvent, StripeClient): void $handler Handles v2.signals.account_signal.fraudulent_merchant_ready events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2SignalsAccountSignalFraudulentMerchantReady($handler)
    {
        $this->register(
            'v2.signals.account_signal.fraudulent_merchant_ready',
            $handler
        );
    }
    // event-handler-methods: The end of the section generated from our OpenAPI spec
}
