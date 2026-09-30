<?php

namespace Stripe;

/**
 * Shared registration and dispatch machinery for StripeEventNotificationHandler and
 * StripeEventNotificationHandlerWithoutVerification.
 *
 * Deliberately declares no handle(). PHP requires an override to stay compatible with
 * the parent's parameter list, so neither handler can subclass the other without
 * carrying a parameter it doesn't want; as siblings, each declares its own signature.
 *
 * @internal implementation detail; do not depend on this class directly
 */
abstract class AbstractEventNotificationHandler
{
    /** @var array<string, callable> */
    protected $registeredHandlers = [];
    /** @var StripeClient */
    protected $client;
    protected $hasHandledEvents = false;
    /** @var callable(V2\Core\EventNotification, StripeClient, UnhandledNotificationDetails): void */
    protected $fallbackCallback;
    /** @var array<string, mixed> everything we need to duplicate a client */
    protected $clientConfig;
    /** @var null|callable(V2\Core\EventNotification, StripeClient): bool */
    protected $preHandleCallback = null;

    /**
     * @param StripeClient $client The Stripe client to use for API interactions
     * @param callable(V2\Core\EventNotification, StripeClient, UnhandledNotificationDetails): void $fallbackCallback A callback that's invoked for unhandled events. It receives the notification as parsed, so it's a specific subclass for event types this SDK knows about and an Events\UnknownEventNotification otherwise; check UnhandledNotificationDetails::$isKnownEventType or use instanceof to narrow
     */
    public function __construct($client, $fallbackCallback)
    {
        $this->client = $client;
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
     * Dispatches a parsed event notification to the appropriate handler.
     *
     * @param V2\Core\EventNotification $notif The parsed event notification
     *
     * @return void
     */
    protected function dispatch($notif)
    {
        $eventType = $notif->type;

        // Create a new client instance with the event's context instead of modifying the shared client
        $eventClient = $this->createClientWithContext($notif->context);

        if (null !== $this->preHandleCallback && !\call_user_func($this->preHandleCallback, $notif, $eventClient)) {
            return;
        }

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
    protected function createClientWithContext($context)
    {
        $config = $this->clientConfig;
        $config['stripe_account'] = null;
        $config['stripe_context'] = $context;

        return new StripeClient($config);
    }

    /**
     * Callbacks are expected to be registered on startup, so registering anything
     * after handling an event indicates a bug.
     *
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    private function assertHasntHandledYet()
    {
        if ($this->hasHandledEvents) {
            throw new Exception\BadMethodCallException('Cannot register new callbacks after an event has been handled. This is indicative of a bug.');
        }
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
    protected function register($eventType, $handler)
    {
        $this->assertHasntHandledYet();
        if (isset($this->registeredHandlers[$eventType])) {
            throw new Exception\InvalidArgumentException("Callback for event type \"{$eventType}\" is already registered");
        }

        $this->registeredHandlers[$eventType] = $handler;
    }

    /**
     * Registers a function that will be run before any event-specific callbacks. A useful place to
     * store event-agnostic logic, such as logging or checking for
     * [duplicate event deliveries](https://docs.stripe.com/webhooks#handle-duplicate-events).
     *
     * Returning `true` causes handling to continue as normal; returning `false` returns from
     * `.handle()` immediately, so neither the registered callback nor the fallback callback are called.
     *
     * @param callable(V2\Core\EventNotification, StripeClient): bool $handler Return false to stop handling before any callback runs
     *
     * @throws Exception\InvalidArgumentException if a pre-handle hook is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function preHandle($handler)
    {
        $this->assertHasntHandledYet();
        if (null !== $this->preHandleCallback) {
            throw new Exception\InvalidArgumentException('A preHandle callback is already registered');
        }

        $this->preHandleCallback = $handler;
    }

    // event-handler-methods: The beginning of the section generated from our OpenAPI spec
    /**
     * Registers a handler for the "v1.account.application.authorized" event.
     *
     * @param callable(Events\V1AccountApplicationAuthorizedEventNotification, StripeClient): void $handler Handles v1.account.application.authorized events
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
     * @param callable(Events\V1AccountApplicationDeauthorizedEventNotification, StripeClient): void $handler Handles v1.account.application.deauthorized events
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
     * @param callable(Events\V1AccountExternalAccountCreatedEventNotification, StripeClient): void $handler Handles v1.account.external_account.created events
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
     * @param callable(Events\V1AccountExternalAccountDeletedEventNotification, StripeClient): void $handler Handles v1.account.external_account.deleted events
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
     * @param callable(Events\V1AccountExternalAccountUpdatedEventNotification, StripeClient): void $handler Handles v1.account.external_account.updated events
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
     * @param callable(Events\V1AccountUpdatedEventNotification, StripeClient): void $handler Handles v1.account.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1AccountUpdated($handler)
    {
        $this->register('v1.account.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.application_fee.created" event.
     *
     * @param callable(Events\V1ApplicationFeeCreatedEventNotification, StripeClient): void $handler Handles v1.application_fee.created events
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
     * @param callable(Events\V1ApplicationFeeRefundUpdatedEventNotification, StripeClient): void $handler Handles v1.application_fee.refund.updated events
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
     * @param callable(Events\V1ApplicationFeeRefundedEventNotification, StripeClient): void $handler Handles v1.application_fee.refunded events
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
     * @param callable(Events\V1BalanceAvailableEventNotification, StripeClient): void $handler Handles v1.balance.available events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BalanceAvailable($handler)
    {
        $this->register('v1.balance.available', $handler);
    }

    /**
     * Registers a handler for the "v1.balance_settings.updated" event.
     *
     * @param callable(Events\V1BalanceSettingsUpdatedEventNotification, StripeClient): void $handler Handles v1.balance_settings.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BalanceSettingsUpdated($handler)
    {
        $this->register('v1.balance_settings.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.alert.triggered" event.
     *
     * @param callable(Events\V1BillingAlertTriggeredEventNotification, StripeClient): void $handler Handles v1.billing.alert.triggered events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingAlertTriggered($handler)
    {
        $this->register('v1.billing.alert.triggered', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.credit_balance_transaction.created" event.
     *
     * @param callable(Events\V1BillingCreditBalanceTransactionCreatedEventNotification, StripeClient): void $handler Handles v1.billing.credit_balance_transaction.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingCreditBalanceTransactionCreated($handler)
    {
        $this->register('v1.billing.credit_balance_transaction.created', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.credit_grant.created" event.
     *
     * @param callable(Events\V1BillingCreditGrantCreatedEventNotification, StripeClient): void $handler Handles v1.billing.credit_grant.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingCreditGrantCreated($handler)
    {
        $this->register('v1.billing.credit_grant.created', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.credit_grant.updated" event.
     *
     * @param callable(Events\V1BillingCreditGrantUpdatedEventNotification, StripeClient): void $handler Handles v1.billing.credit_grant.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingCreditGrantUpdated($handler)
    {
        $this->register('v1.billing.credit_grant.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.meter.created" event.
     *
     * @param callable(Events\V1BillingMeterCreatedEventNotification, StripeClient): void $handler Handles v1.billing.meter.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingMeterCreated($handler)
    {
        $this->register('v1.billing.meter.created', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.meter.deactivated" event.
     *
     * @param callable(Events\V1BillingMeterDeactivatedEventNotification, StripeClient): void $handler Handles v1.billing.meter.deactivated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingMeterDeactivated($handler)
    {
        $this->register('v1.billing.meter.deactivated', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.meter.error_report_triggered" event.
     *
     * @param callable(Events\V1BillingMeterErrorReportTriggeredEventNotification, StripeClient): void $handler Handles v1.billing.meter.error_report_triggered events
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
     * @param callable(Events\V1BillingMeterNoMeterFoundEventNotification, StripeClient): void $handler Handles v1.billing.meter.no_meter_found events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingMeterNoMeterFound($handler)
    {
        $this->register('v1.billing.meter.no_meter_found', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.meter.reactivated" event.
     *
     * @param callable(Events\V1BillingMeterReactivatedEventNotification, StripeClient): void $handler Handles v1.billing.meter.reactivated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingMeterReactivated($handler)
    {
        $this->register('v1.billing.meter.reactivated', $handler);
    }

    /**
     * Registers a handler for the "v1.billing.meter.updated" event.
     *
     * @param callable(Events\V1BillingMeterUpdatedEventNotification, StripeClient): void $handler Handles v1.billing.meter.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1BillingMeterUpdated($handler)
    {
        $this->register('v1.billing.meter.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.billing_portal.configuration.created" event.
     *
     * @param callable(Events\V1BillingPortalConfigurationCreatedEventNotification, StripeClient): void $handler Handles v1.billing_portal.configuration.created events
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
     * @param callable(Events\V1BillingPortalConfigurationUpdatedEventNotification, StripeClient): void $handler Handles v1.billing_portal.configuration.updated events
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
     * @param callable(Events\V1BillingPortalSessionCreatedEventNotification, StripeClient): void $handler Handles v1.billing_portal.session.created events
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
     * @param callable(Events\V1CapabilityUpdatedEventNotification, StripeClient): void $handler Handles v1.capability.updated events
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
     * @param callable(Events\V1CashBalanceFundsAvailableEventNotification, StripeClient): void $handler Handles v1.cash_balance.funds_available events
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
     * @param callable(Events\V1ChargeCapturedEventNotification, StripeClient): void $handler Handles v1.charge.captured events
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
     * @param callable(Events\V1ChargeDisputeClosedEventNotification, StripeClient): void $handler Handles v1.charge.dispute.closed events
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
     * @param callable(Events\V1ChargeDisputeCreatedEventNotification, StripeClient): void $handler Handles v1.charge.dispute.created events
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
     * @param callable(Events\V1ChargeDisputeFundsReinstatedEventNotification, StripeClient): void $handler Handles v1.charge.dispute.funds_reinstated events
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
     * @param callable(Events\V1ChargeDisputeFundsWithdrawnEventNotification, StripeClient): void $handler Handles v1.charge.dispute.funds_withdrawn events
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
     * @param callable(Events\V1ChargeDisputeUpdatedEventNotification, StripeClient): void $handler Handles v1.charge.dispute.updated events
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
     * @param callable(Events\V1ChargeExpiredEventNotification, StripeClient): void $handler Handles v1.charge.expired events
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
     * @param callable(Events\V1ChargeFailedEventNotification, StripeClient): void $handler Handles v1.charge.failed events
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
     * @param callable(Events\V1ChargePendingEventNotification, StripeClient): void $handler Handles v1.charge.pending events
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
     * @param callable(Events\V1ChargeRefundUpdatedEventNotification, StripeClient): void $handler Handles v1.charge.refund.updated events
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
     * @param callable(Events\V1ChargeRefundedEventNotification, StripeClient): void $handler Handles v1.charge.refunded events
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
     * @param callable(Events\V1ChargeSucceededEventNotification, StripeClient): void $handler Handles v1.charge.succeeded events
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
     * @param callable(Events\V1ChargeUpdatedEventNotification, StripeClient): void $handler Handles v1.charge.updated events
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
     * @param callable(Events\V1CheckoutSessionAsyncPaymentFailedEventNotification, StripeClient): void $handler Handles v1.checkout.session.async_payment_failed events
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
     * @param callable(Events\V1CheckoutSessionAsyncPaymentSucceededEventNotification, StripeClient): void $handler Handles v1.checkout.session.async_payment_succeeded events
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
     * @param callable(Events\V1CheckoutSessionCompletedEventNotification, StripeClient): void $handler Handles v1.checkout.session.completed events
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
     * @param callable(Events\V1CheckoutSessionExpiredEventNotification, StripeClient): void $handler Handles v1.checkout.session.expired events
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
     * @param callable(Events\V1ClimateOrderCanceledEventNotification, StripeClient): void $handler Handles v1.climate.order.canceled events
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
     * @param callable(Events\V1ClimateOrderCreatedEventNotification, StripeClient): void $handler Handles v1.climate.order.created events
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
     * @param callable(Events\V1ClimateOrderDelayedEventNotification, StripeClient): void $handler Handles v1.climate.order.delayed events
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
     * @param callable(Events\V1ClimateOrderDeliveredEventNotification, StripeClient): void $handler Handles v1.climate.order.delivered events
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
     * @param callable(Events\V1ClimateOrderProductSubstitutedEventNotification, StripeClient): void $handler Handles v1.climate.order.product_substituted events
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
     * @param callable(Events\V1ClimateProductCreatedEventNotification, StripeClient): void $handler Handles v1.climate.product.created events
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
     * @param callable(Events\V1ClimateProductPricingUpdatedEventNotification, StripeClient): void $handler Handles v1.climate.product.pricing_updated events
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
     * @param callable(Events\V1CouponCreatedEventNotification, StripeClient): void $handler Handles v1.coupon.created events
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
     * @param callable(Events\V1CouponDeletedEventNotification, StripeClient): void $handler Handles v1.coupon.deleted events
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
     * @param callable(Events\V1CouponUpdatedEventNotification, StripeClient): void $handler Handles v1.coupon.updated events
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
     * @param callable(Events\V1CreditNoteCreatedEventNotification, StripeClient): void $handler Handles v1.credit_note.created events
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
     * @param callable(Events\V1CreditNoteUpdatedEventNotification, StripeClient): void $handler Handles v1.credit_note.updated events
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
     * @param callable(Events\V1CreditNoteVoidedEventNotification, StripeClient): void $handler Handles v1.credit_note.voided events
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
     * @param callable(Events\V1CustomerCreatedEventNotification, StripeClient): void $handler Handles v1.customer.created events
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
     * @param callable(Events\V1CustomerDeletedEventNotification, StripeClient): void $handler Handles v1.customer.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerDeleted($handler)
    {
        $this->register('v1.customer.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.discount.created" event.
     *
     * @param callable(Events\V1CustomerDiscountCreatedEventNotification, StripeClient): void $handler Handles v1.customer.discount.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerDiscountCreated($handler)
    {
        $this->register('v1.customer.discount.created', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.discount.deleted" event.
     *
     * @param callable(Events\V1CustomerDiscountDeletedEventNotification, StripeClient): void $handler Handles v1.customer.discount.deleted events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerDiscountDeleted($handler)
    {
        $this->register('v1.customer.discount.deleted', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.discount.updated" event.
     *
     * @param callable(Events\V1CustomerDiscountUpdatedEventNotification, StripeClient): void $handler Handles v1.customer.discount.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1CustomerDiscountUpdated($handler)
    {
        $this->register('v1.customer.discount.updated', $handler);
    }

    /**
     * Registers a handler for the "v1.customer.subscription.created" event.
     *
     * @param callable(Events\V1CustomerSubscriptionCreatedEventNotification, StripeClient): void $handler Handles v1.customer.subscription.created events
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
     * @param callable(Events\V1CustomerSubscriptionDeletedEventNotification, StripeClient): void $handler Handles v1.customer.subscription.deleted events
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
     * @param callable(Events\V1CustomerSubscriptionPausedEventNotification, StripeClient): void $handler Handles v1.customer.subscription.paused events
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
     * @param callable(Events\V1CustomerSubscriptionPendingUpdateAppliedEventNotification, StripeClient): void $handler Handles v1.customer.subscription.pending_update_applied events
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
     * @param callable(Events\V1CustomerSubscriptionPendingUpdateExpiredEventNotification, StripeClient): void $handler Handles v1.customer.subscription.pending_update_expired events
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
     * @param callable(Events\V1CustomerSubscriptionResumedEventNotification, StripeClient): void $handler Handles v1.customer.subscription.resumed events
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
     * @param callable(Events\V1CustomerSubscriptionTrialWillEndEventNotification, StripeClient): void $handler Handles v1.customer.subscription.trial_will_end events
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
     * @param callable(Events\V1CustomerSubscriptionUpdatedEventNotification, StripeClient): void $handler Handles v1.customer.subscription.updated events
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
     * @param callable(Events\V1CustomerTaxIdCreatedEventNotification, StripeClient): void $handler Handles v1.customer.tax_id.created events
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
     * @param callable(Events\V1CustomerTaxIdDeletedEventNotification, StripeClient): void $handler Handles v1.customer.tax_id.deleted events
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
     * @param callable(Events\V1CustomerTaxIdUpdatedEventNotification, StripeClient): void $handler Handles v1.customer.tax_id.updated events
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
     * @param callable(Events\V1CustomerUpdatedEventNotification, StripeClient): void $handler Handles v1.customer.updated events
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
     * @param callable(Events\V1CustomerCashBalanceTransactionCreatedEventNotification, StripeClient): void $handler Handles v1.customer_cash_balance_transaction.created events
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
     * @param callable(Events\V1EntitlementsActiveEntitlementSummaryUpdatedEventNotification, StripeClient): void $handler Handles v1.entitlements.active_entitlement_summary.updated events
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
     * @param callable(Events\V1FileCreatedEventNotification, StripeClient): void $handler Handles v1.file.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FileCreated($handler)
    {
        $this->register('v1.file.created', $handler);
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.account_numbers_updated" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountAccountNumbersUpdatedEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.account_numbers_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountAccountNumbersUpdated(
        $handler
    ) {
        $this->register(
            'v1.financial_connections.account.account_numbers_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.created" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountCreatedEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.created events
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
     * @param callable(Events\V1FinancialConnectionsAccountDeactivatedEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.deactivated events
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
     * @param callable(Events\V1FinancialConnectionsAccountDisconnectedEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.disconnected events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountDisconnected($handler)
    {
        $this->register('v1.financial_connections.account.disconnected', $handler);
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.expected_deactivation_date_updated" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountExpectedDeactivationDateUpdatedEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.expected_deactivation_date_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountExpectedDeactivationDateUpdated(
        $handler
    ) {
        $this->register(
            'v1.financial_connections.account.expected_deactivation_date_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.reactivated" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountReactivatedEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.reactivated events
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
     * @param callable(Events\V1FinancialConnectionsAccountRefreshedBalanceEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.refreshed_balance events
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
     * @param callable(Events\V1FinancialConnectionsAccountRefreshedOwnershipEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.refreshed_ownership events
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
     * @param callable(Events\V1FinancialConnectionsAccountRefreshedTransactionsEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.refreshed_transactions events
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
     * Registers a handler for the "v1.financial_connections.account.supported_payment_method_types_updated" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountSupportedPaymentMethodTypesUpdatedEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.supported_payment_method_types_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountSupportedPaymentMethodTypesUpdated(
        $handler
    ) {
        $this->register(
            'v1.financial_connections.account.supported_payment_method_types_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.upcoming_account_number_expiry" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountUpcomingAccountNumberExpiryEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.upcoming_account_number_expiry events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountUpcomingAccountNumberExpiry(
        $handler
    ) {
        $this->register(
            'v1.financial_connections.account.upcoming_account_number_expiry',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.financial_connections.account.upcoming_deactivation" event.
     *
     * @param callable(Events\V1FinancialConnectionsAccountUpcomingDeactivationEventNotification, StripeClient): void $handler Handles v1.financial_connections.account.upcoming_deactivation events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1FinancialConnectionsAccountUpcomingDeactivation($handler)
    {
        $this->register(
            'v1.financial_connections.account.upcoming_deactivation',
            $handler
        );
    }

    /**
     * Registers a handler for the "v1.identity.verification_session.canceled" event.
     *
     * @param callable(Events\V1IdentityVerificationSessionCanceledEventNotification, StripeClient): void $handler Handles v1.identity.verification_session.canceled events
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
     * @param callable(Events\V1IdentityVerificationSessionCreatedEventNotification, StripeClient): void $handler Handles v1.identity.verification_session.created events
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
     * @param callable(Events\V1IdentityVerificationSessionProcessingEventNotification, StripeClient): void $handler Handles v1.identity.verification_session.processing events
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
     * @param callable(Events\V1IdentityVerificationSessionRedactedEventNotification, StripeClient): void $handler Handles v1.identity.verification_session.redacted events
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
     * @param callable(Events\V1IdentityVerificationSessionRequiresInputEventNotification, StripeClient): void $handler Handles v1.identity.verification_session.requires_input events
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
     * @param callable(Events\V1IdentityVerificationSessionVerifiedEventNotification, StripeClient): void $handler Handles v1.identity.verification_session.verified events
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
     * @param callable(Events\V1InvoiceCreatedEventNotification, StripeClient): void $handler Handles v1.invoice.created events
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
     * @param callable(Events\V1InvoiceDeletedEventNotification, StripeClient): void $handler Handles v1.invoice.deleted events
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
     * @param callable(Events\V1InvoiceFinalizationFailedEventNotification, StripeClient): void $handler Handles v1.invoice.finalization_failed events
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
     * @param callable(Events\V1InvoiceFinalizedEventNotification, StripeClient): void $handler Handles v1.invoice.finalized events
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
     * @param callable(Events\V1InvoiceMarkedUncollectibleEventNotification, StripeClient): void $handler Handles v1.invoice.marked_uncollectible events
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
     * @param callable(Events\V1InvoiceOverdueEventNotification, StripeClient): void $handler Handles v1.invoice.overdue events
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
     * @param callable(Events\V1InvoiceOverpaidEventNotification, StripeClient): void $handler Handles v1.invoice.overpaid events
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
     * @param callable(Events\V1InvoicePaidEventNotification, StripeClient): void $handler Handles v1.invoice.paid events
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
     * @param callable(Events\V1InvoicePaymentActionRequiredEventNotification, StripeClient): void $handler Handles v1.invoice.payment_action_required events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoicePaymentActionRequired($handler)
    {
        $this->register('v1.invoice.payment_action_required', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.payment_attempt_required" event.
     *
     * @param callable(Events\V1InvoicePaymentAttemptRequiredEventNotification, StripeClient): void $handler Handles v1.invoice.payment_attempt_required events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1InvoicePaymentAttemptRequired($handler)
    {
        $this->register('v1.invoice.payment_attempt_required', $handler);
    }

    /**
     * Registers a handler for the "v1.invoice.payment_failed" event.
     *
     * @param callable(Events\V1InvoicePaymentFailedEventNotification, StripeClient): void $handler Handles v1.invoice.payment_failed events
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
     * @param callable(Events\V1InvoicePaymentSucceededEventNotification, StripeClient): void $handler Handles v1.invoice.payment_succeeded events
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
     * @param callable(Events\V1InvoiceSentEventNotification, StripeClient): void $handler Handles v1.invoice.sent events
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
     * @param callable(Events\V1InvoiceUpcomingEventNotification, StripeClient): void $handler Handles v1.invoice.upcoming events
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
     * @param callable(Events\V1InvoiceUpdatedEventNotification, StripeClient): void $handler Handles v1.invoice.updated events
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
     * @param callable(Events\V1InvoiceVoidedEventNotification, StripeClient): void $handler Handles v1.invoice.voided events
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
     * @param callable(Events\V1InvoiceWillBeDueEventNotification, StripeClient): void $handler Handles v1.invoice.will_be_due events
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
     * @param callable(Events\V1InvoicePaymentPaidEventNotification, StripeClient): void $handler Handles v1.invoice_payment.paid events
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
     * @param callable(Events\V1InvoiceitemCreatedEventNotification, StripeClient): void $handler Handles v1.invoiceitem.created events
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
     * @param callable(Events\V1InvoiceitemDeletedEventNotification, StripeClient): void $handler Handles v1.invoiceitem.deleted events
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
     * @param callable(Events\V1IssuingAuthorizationCreatedEventNotification, StripeClient): void $handler Handles v1.issuing_authorization.created events
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
     * @param callable(Events\V1IssuingAuthorizationRequestEventNotification, StripeClient): void $handler Handles v1.issuing_authorization.request events
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
     * @param callable(Events\V1IssuingAuthorizationUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_authorization.updated events
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
     * @param callable(Events\V1IssuingCardCreatedEventNotification, StripeClient): void $handler Handles v1.issuing_card.created events
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
     * @param callable(Events\V1IssuingCardUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_card.updated events
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
     * @param callable(Events\V1IssuingCardholderCreatedEventNotification, StripeClient): void $handler Handles v1.issuing_cardholder.created events
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
     * @param callable(Events\V1IssuingCardholderUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_cardholder.updated events
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
     * @param callable(Events\V1IssuingDisputeClosedEventNotification, StripeClient): void $handler Handles v1.issuing_dispute.closed events
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
     * @param callable(Events\V1IssuingDisputeCreatedEventNotification, StripeClient): void $handler Handles v1.issuing_dispute.created events
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
     * @param callable(Events\V1IssuingDisputeFundsReinstatedEventNotification, StripeClient): void $handler Handles v1.issuing_dispute.funds_reinstated events
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
     * @param callable(Events\V1IssuingDisputeFundsRescindedEventNotification, StripeClient): void $handler Handles v1.issuing_dispute.funds_rescinded events
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
     * @param callable(Events\V1IssuingDisputeSubmittedEventNotification, StripeClient): void $handler Handles v1.issuing_dispute.submitted events
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
     * @param callable(Events\V1IssuingDisputeUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_dispute.updated events
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
     * @param callable(Events\V1IssuingPersonalizationDesignActivatedEventNotification, StripeClient): void $handler Handles v1.issuing_personalization_design.activated events
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
     * @param callable(Events\V1IssuingPersonalizationDesignDeactivatedEventNotification, StripeClient): void $handler Handles v1.issuing_personalization_design.deactivated events
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
     * @param callable(Events\V1IssuingPersonalizationDesignRejectedEventNotification, StripeClient): void $handler Handles v1.issuing_personalization_design.rejected events
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
     * @param callable(Events\V1IssuingPersonalizationDesignUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_personalization_design.updated events
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
     * @param callable(Events\V1IssuingTokenCreatedEventNotification, StripeClient): void $handler Handles v1.issuing_token.created events
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
     * @param callable(Events\V1IssuingTokenUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_token.updated events
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
     * @param callable(Events\V1IssuingTransactionCreatedEventNotification, StripeClient): void $handler Handles v1.issuing_transaction.created events
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
     * @param callable(Events\V1IssuingTransactionPurchaseDetailsReceiptUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_transaction.purchase_details_receipt_updated events
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
     * @param callable(Events\V1IssuingTransactionUpdatedEventNotification, StripeClient): void $handler Handles v1.issuing_transaction.updated events
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
     * @param callable(Events\V1MandateUpdatedEventNotification, StripeClient): void $handler Handles v1.mandate.updated events
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
     * @param callable(Events\V1PaymentIntentAmountCapturableUpdatedEventNotification, StripeClient): void $handler Handles v1.payment_intent.amount_capturable_updated events
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
     * @param callable(Events\V1PaymentIntentCanceledEventNotification, StripeClient): void $handler Handles v1.payment_intent.canceled events
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
     * @param callable(Events\V1PaymentIntentCreatedEventNotification, StripeClient): void $handler Handles v1.payment_intent.created events
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
     * @param callable(Events\V1PaymentIntentPartiallyFundedEventNotification, StripeClient): void $handler Handles v1.payment_intent.partially_funded events
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
     * @param callable(Events\V1PaymentIntentPaymentFailedEventNotification, StripeClient): void $handler Handles v1.payment_intent.payment_failed events
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
     * @param callable(Events\V1PaymentIntentProcessingEventNotification, StripeClient): void $handler Handles v1.payment_intent.processing events
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
     * @param callable(Events\V1PaymentIntentRequiresActionEventNotification, StripeClient): void $handler Handles v1.payment_intent.requires_action events
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
     * @param callable(Events\V1PaymentIntentSucceededEventNotification, StripeClient): void $handler Handles v1.payment_intent.succeeded events
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
     * @param callable(Events\V1PaymentLinkCreatedEventNotification, StripeClient): void $handler Handles v1.payment_link.created events
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
     * @param callable(Events\V1PaymentLinkUpdatedEventNotification, StripeClient): void $handler Handles v1.payment_link.updated events
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
     * @param callable(Events\V1PaymentMethodAttachedEventNotification, StripeClient): void $handler Handles v1.payment_method.attached events
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
     * @param callable(Events\V1PaymentMethodAutomaticallyUpdatedEventNotification, StripeClient): void $handler Handles v1.payment_method.automatically_updated events
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
     * @param callable(Events\V1PaymentMethodDetachedEventNotification, StripeClient): void $handler Handles v1.payment_method.detached events
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
     * @param callable(Events\V1PaymentMethodUpdatedEventNotification, StripeClient): void $handler Handles v1.payment_method.updated events
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
     * @param callable(Events\V1PayoutCanceledEventNotification, StripeClient): void $handler Handles v1.payout.canceled events
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
     * @param callable(Events\V1PayoutCreatedEventNotification, StripeClient): void $handler Handles v1.payout.created events
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
     * @param callable(Events\V1PayoutFailedEventNotification, StripeClient): void $handler Handles v1.payout.failed events
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
     * @param callable(Events\V1PayoutPaidEventNotification, StripeClient): void $handler Handles v1.payout.paid events
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
     * @param callable(Events\V1PayoutReconciliationCompletedEventNotification, StripeClient): void $handler Handles v1.payout.reconciliation_completed events
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
     * @param callable(Events\V1PayoutUpdatedEventNotification, StripeClient): void $handler Handles v1.payout.updated events
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
     * @param callable(Events\V1PersonCreatedEventNotification, StripeClient): void $handler Handles v1.person.created events
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
     * @param callable(Events\V1PersonDeletedEventNotification, StripeClient): void $handler Handles v1.person.deleted events
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
     * @param callable(Events\V1PersonUpdatedEventNotification, StripeClient): void $handler Handles v1.person.updated events
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
     * @param callable(Events\V1PlanCreatedEventNotification, StripeClient): void $handler Handles v1.plan.created events
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
     * @param callable(Events\V1PlanDeletedEventNotification, StripeClient): void $handler Handles v1.plan.deleted events
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
     * @param callable(Events\V1PlanUpdatedEventNotification, StripeClient): void $handler Handles v1.plan.updated events
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
     * @param callable(Events\V1PriceCreatedEventNotification, StripeClient): void $handler Handles v1.price.created events
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
     * @param callable(Events\V1PriceDeletedEventNotification, StripeClient): void $handler Handles v1.price.deleted events
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
     * @param callable(Events\V1PriceUpdatedEventNotification, StripeClient): void $handler Handles v1.price.updated events
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
     * @param callable(Events\V1ProductCreatedEventNotification, StripeClient): void $handler Handles v1.product.created events
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
     * @param callable(Events\V1ProductDeletedEventNotification, StripeClient): void $handler Handles v1.product.deleted events
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
     * @param callable(Events\V1ProductUpdatedEventNotification, StripeClient): void $handler Handles v1.product.updated events
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
     * @param callable(Events\V1PromotionCodeCreatedEventNotification, StripeClient): void $handler Handles v1.promotion_code.created events
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
     * @param callable(Events\V1PromotionCodeUpdatedEventNotification, StripeClient): void $handler Handles v1.promotion_code.updated events
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
     * @param callable(Events\V1QuoteAcceptedEventNotification, StripeClient): void $handler Handles v1.quote.accepted events
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
     * @param callable(Events\V1QuoteCanceledEventNotification, StripeClient): void $handler Handles v1.quote.canceled events
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
     * @param callable(Events\V1QuoteCreatedEventNotification, StripeClient): void $handler Handles v1.quote.created events
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
     * @param callable(Events\V1QuoteFinalizedEventNotification, StripeClient): void $handler Handles v1.quote.finalized events
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
     * @param callable(Events\V1RadarEarlyFraudWarningCreatedEventNotification, StripeClient): void $handler Handles v1.radar.early_fraud_warning.created events
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
     * @param callable(Events\V1RadarEarlyFraudWarningUpdatedEventNotification, StripeClient): void $handler Handles v1.radar.early_fraud_warning.updated events
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
     * @param callable(Events\V1RefundCreatedEventNotification, StripeClient): void $handler Handles v1.refund.created events
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
     * @param callable(Events\V1RefundFailedEventNotification, StripeClient): void $handler Handles v1.refund.failed events
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
     * @param callable(Events\V1RefundUpdatedEventNotification, StripeClient): void $handler Handles v1.refund.updated events
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
     * @param callable(Events\V1ReviewClosedEventNotification, StripeClient): void $handler Handles v1.review.closed events
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
     * @param callable(Events\V1ReviewOpenedEventNotification, StripeClient): void $handler Handles v1.review.opened events
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
     * @param callable(Events\V1SetupIntentCanceledEventNotification, StripeClient): void $handler Handles v1.setup_intent.canceled events
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
     * @param callable(Events\V1SetupIntentCreatedEventNotification, StripeClient): void $handler Handles v1.setup_intent.created events
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
     * @param callable(Events\V1SetupIntentRequiresActionEventNotification, StripeClient): void $handler Handles v1.setup_intent.requires_action events
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
     * @param callable(Events\V1SetupIntentSetupFailedEventNotification, StripeClient): void $handler Handles v1.setup_intent.setup_failed events
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
     * @param callable(Events\V1SetupIntentSucceededEventNotification, StripeClient): void $handler Handles v1.setup_intent.succeeded events
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
     * @param callable(Events\V1SigmaScheduledQueryRunCreatedEventNotification, StripeClient): void $handler Handles v1.sigma.scheduled_query_run.created events
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
     * @param callable(Events\V1SourceCanceledEventNotification, StripeClient): void $handler Handles v1.source.canceled events
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
     * @param callable(Events\V1SourceChargeableEventNotification, StripeClient): void $handler Handles v1.source.chargeable events
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
     * @param callable(Events\V1SourceFailedEventNotification, StripeClient): void $handler Handles v1.source.failed events
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
     * @param callable(Events\V1SourceRefundAttributesRequiredEventNotification, StripeClient): void $handler Handles v1.source.refund_attributes_required events
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
     * @param callable(Events\V1SubscriptionScheduleAbortedEventNotification, StripeClient): void $handler Handles v1.subscription_schedule.aborted events
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
     * @param callable(Events\V1SubscriptionScheduleCanceledEventNotification, StripeClient): void $handler Handles v1.subscription_schedule.canceled events
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
     * @param callable(Events\V1SubscriptionScheduleCompletedEventNotification, StripeClient): void $handler Handles v1.subscription_schedule.completed events
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
     * @param callable(Events\V1SubscriptionScheduleCreatedEventNotification, StripeClient): void $handler Handles v1.subscription_schedule.created events
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
     * @param callable(Events\V1SubscriptionScheduleExpiringEventNotification, StripeClient): void $handler Handles v1.subscription_schedule.expiring events
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
     * @param callable(Events\V1SubscriptionScheduleReleasedEventNotification, StripeClient): void $handler Handles v1.subscription_schedule.released events
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
     * @param callable(Events\V1SubscriptionScheduleUpdatedEventNotification, StripeClient): void $handler Handles v1.subscription_schedule.updated events
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
     * @param callable(Events\V1TaxSettingsUpdatedEventNotification, StripeClient): void $handler Handles v1.tax.settings.updated events
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
     * @param callable(Events\V1TaxRateCreatedEventNotification, StripeClient): void $handler Handles v1.tax_rate.created events
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
     * @param callable(Events\V1TaxRateUpdatedEventNotification, StripeClient): void $handler Handles v1.tax_rate.updated events
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
     * @param callable(Events\V1TerminalReaderActionFailedEventNotification, StripeClient): void $handler Handles v1.terminal.reader.action_failed events
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
     * @param callable(Events\V1TerminalReaderActionSucceededEventNotification, StripeClient): void $handler Handles v1.terminal.reader.action_succeeded events
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
     * @param callable(Events\V1TerminalReaderActionUpdatedEventNotification, StripeClient): void $handler Handles v1.terminal.reader.action_updated events
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
     * @param callable(Events\V1TestHelpersTestClockAdvancingEventNotification, StripeClient): void $handler Handles v1.test_helpers.test_clock.advancing events
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
     * @param callable(Events\V1TestHelpersTestClockCreatedEventNotification, StripeClient): void $handler Handles v1.test_helpers.test_clock.created events
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
     * @param callable(Events\V1TestHelpersTestClockDeletedEventNotification, StripeClient): void $handler Handles v1.test_helpers.test_clock.deleted events
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
     * @param callable(Events\V1TestHelpersTestClockInternalFailureEventNotification, StripeClient): void $handler Handles v1.test_helpers.test_clock.internal_failure events
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
     * @param callable(Events\V1TestHelpersTestClockReadyEventNotification, StripeClient): void $handler Handles v1.test_helpers.test_clock.ready events
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
     * @param callable(Events\V1TopupCanceledEventNotification, StripeClient): void $handler Handles v1.topup.canceled events
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
     * @param callable(Events\V1TopupCreatedEventNotification, StripeClient): void $handler Handles v1.topup.created events
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
     * @param callable(Events\V1TopupFailedEventNotification, StripeClient): void $handler Handles v1.topup.failed events
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
     * @param callable(Events\V1TopupReversedEventNotification, StripeClient): void $handler Handles v1.topup.reversed events
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
     * @param callable(Events\V1TopupSucceededEventNotification, StripeClient): void $handler Handles v1.topup.succeeded events
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
     * @param callable(Events\V1TransferCreatedEventNotification, StripeClient): void $handler Handles v1.transfer.created events
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
     * @param callable(Events\V1TransferReversedEventNotification, StripeClient): void $handler Handles v1.transfer.reversed events
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
     * @param callable(Events\V1TransferUpdatedEventNotification, StripeClient): void $handler Handles v1.transfer.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV1TransferUpdated($handler)
    {
        $this->register('v1.transfer.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.commerce.product_catalog.imports.failed" event.
     *
     * @param callable(Events\V2CommerceProductCatalogImportsFailedEventNotification, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.failed events
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
     * @param callable(Events\V2CommerceProductCatalogImportsProcessingEventNotification, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.processing events
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
     * @param callable(Events\V2CommerceProductCatalogImportsSucceededEventNotification, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.succeeded events
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
     * @param callable(Events\V2CommerceProductCatalogImportsSucceededWithErrorsEventNotification, StripeClient): void $handler Handles v2.commerce.product_catalog.imports.succeeded_with_errors events
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
     * @param callable(Events\V2CoreAccountClosedEventNotification, StripeClient): void $handler Handles v2.core.account.closed events
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
     * @param callable(Events\V2CoreAccountCreatedEventNotification, StripeClient): void $handler Handles v2.core.account.created events
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
     * @param callable(Events\V2CoreAccountUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountUpdated($handler)
    {
        $this->register('v2.core.account.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.customer].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.customer].capability_status_updated events
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
     * @param callable(Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.customer].updated events
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
     * @param callable(Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.merchant].capability_status_updated events
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
     * @param callable(Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.merchant].updated events
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
     * @param callable(Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.recipient].capability_status_updated events
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
     * @param callable(Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.recipient].updated events
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
     * Registers a handler for the "v2.core.account[defaults].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingDefaultsUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[defaults].updated events
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
     * @param callable(Events\V2CoreAccountIncludingFutureRequirementsUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[future_requirements].updated events
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
     * @param callable(Events\V2CoreAccountIncludingIdentityUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[identity].updated events
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
     * @param callable(Events\V2CoreAccountIncludingRequirementsUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[requirements].updated events
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
     * @param callable(Events\V2CoreAccountLinkReturnedEventNotification, StripeClient): void $handler Handles v2.core.account_link.returned events
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
     * @param callable(Events\V2CoreAccountPersonCreatedEventNotification, StripeClient): void $handler Handles v2.core.account_person.created events
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
     * @param callable(Events\V2CoreAccountPersonDeletedEventNotification, StripeClient): void $handler Handles v2.core.account_person.deleted events
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
     * @param callable(Events\V2CoreAccountPersonUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account_person.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountPersonUpdated($handler)
    {
        $this->register('v2.core.account_person.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.event_destination.ping" event.
     *
     * @param callable(Events\V2CoreEventDestinationPingEventNotification, StripeClient): void $handler Handles v2.core.event_destination.ping events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreEventDestinationPing($handler)
    {
        $this->register('v2.core.event_destination.ping', $handler);
    }
    // event-handler-methods: The end of the section generated from our OpenAPI spec
}
