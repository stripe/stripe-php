<?php

namespace Stripe;

const UNKNOWN_EVENT_TYPE_KEY = '__unknown_event_type';

class UnhandledNotificationDetails
{
    /** @var bool whether the SDK has types for this event */
    public $isKnownType;

    public function __construct($isKnownType)
    {
        $this->isKnownType = $isKnownType;
    }
}

class StripeEventRouter
{
    /** @var array<string, callable> */
    private $registeredHandlers = [];
    /** @var StripeClient */
    private $client;
    /** @var string */
    private $webhookSecret;
    private $hasHandledEvents = false;
    private $onUnhandledHandler;

    /**
     * Constructor for StripeEventRouter.
     *
     * @param StripeClient $client The Stripe client to use for API interactions
     * @param string $webhookSecret The webhook secret for verifying signatures
     * @param callable(Events\UnknownEventNotification, StripeClient, UnhandledNotificationDetails): void $onUnhandledHandler A handler to call for unhandled notifications
     */
    public function __construct($client, $webhookSecret, $onUnhandledHandler)
    {
        $this->client = $client;
        $this->webhookSecret = $webhookSecret;
        $this->onUnhandledHandler = $onUnhandledHandler;
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
        $this->hasHandledEvents = true;

        $notif = $this->client->parseEventNotification(
            $payload,
            $sigHeader,
            $this->webhookSecret
        );

        $eventType = $notif->type;

        $originalContext = $this->client->getStripeContextHeader();

        try {
            // TODO: bind the event's context to the client
            $this->client->setStripeContext($notif->context);

            if (isset($this->registeredHandlers[$eventType])) {
                \call_user_func($this->registeredHandlers[$eventType], $notif, $this->client);
            } else {
                \call_user_func($this->onUnhandledHandler, $notif, $this->client, new UnhandledNotificationDetails(!$notif instanceof Events\UnknownEventNotification));
            }
        } finally {
            // Clear references to the client to avoid memory leaks
            $this->client->setStripeContext($originalContext);
        }
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

    // event-router-methods: The beginning of the section generated from our OpenAPI spec
    /**
     * Registers a handler for the "v1.billing.meter.error_report_triggered" event.
     *
     * @param callable(Events\V1BillingMeterErrorReportTriggeredEvent, StripeClient): void $handler Handles v1.billing.meter.error_report_triggered events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V1BillingMeterErrorReportTriggeredEventNotification(
        $handler
    ) {
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
    public function on_V1BillingMeterNoMeterFoundEventNotification($handler)
    {
        $this->register('v1.billing.meter.no_meter_found', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account.closed" event.
     *
     * @param callable(Events\V2CoreAccountClosedEvent, StripeClient): void $handler Handles v2.core.account.closed events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2CoreAccountClosedEventNotification($handler)
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
    public function on_V2CoreAccountCreatedEventNotification($handler)
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
    public function on_V2CoreAccountUpdatedEventNotification($handler)
    {
        $this->register('v2.core.account.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.customer].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent, StripeClient): void $handler Handles v2.core.account[configuration.customer].capability_status_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventNotification(
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
    public function on_V2CoreAccountIncludingConfigurationCustomerUpdatedEventNotification(
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
    public function on_V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventNotification(
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
    public function on_V2CoreAccountIncludingConfigurationMerchantUpdatedEventNotification(
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
    public function on_V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEventNotification(
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
    public function on_V2CoreAccountIncludingConfigurationRecipientUpdatedEventNotification(
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
    public function on_V2CoreAccountIncludingConfigurationStorerCapabilityStatusUpdatedEventNotification(
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
    public function on_V2CoreAccountIncludingConfigurationStorerUpdatedEventNotification(
        $handler
    ) {
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
    public function on_V2CoreAccountIncludingDefaultsUpdatedEventNotification(
        $handler
    ) {
        $this->register('v2.core.account[defaults].updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.account[identity].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingIdentityUpdatedEvent, StripeClient): void $handler Handles v2.core.account[identity].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2CoreAccountIncludingIdentityUpdatedEventNotification(
        $handler
    ) {
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
    public function on_V2CoreAccountIncludingRequirementsUpdatedEventNotification(
        $handler
    ) {
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
    public function on_V2CoreAccountLinkReturnedEventNotification($handler)
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
    public function on_V2CoreAccountPersonCreatedEventNotification($handler)
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
    public function on_V2CoreAccountPersonDeletedEventNotification($handler)
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
    public function on_V2CoreAccountPersonUpdatedEventNotification($handler)
    {
        $this->register('v2.core.account_person.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.core.event_destination.ping" event.
     *
     * @param callable(Events\V2CoreEventDestinationPingEvent, StripeClient): void $handler Handles v2.core.event_destination.ping events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2CoreEventDestinationPingEventNotification($handler)
    {
        $this->register('v2.core.event_destination.ping', $handler);
    }

    /**
     * Registers a handler for the "v2.core.health.event_generation_failure.resolved" event.
     *
     * @param callable(Events\V2CoreHealthEventGenerationFailureResolvedEvent, StripeClient): void $handler Handles v2.core.health.event_generation_failure.resolved events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2CoreHealthEventGenerationFailureResolvedEventNotification(
        $handler
    ) {
        $this->register(
            'v2.core.health.event_generation_failure.resolved',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.adjustment.created" event.
     *
     * @param callable(Events\V2MoneyManagementAdjustmentCreatedEvent, StripeClient): void $handler Handles v2.money_management.adjustment.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2MoneyManagementAdjustmentCreatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementFinancialAccountCreatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementFinancialAccountUpdatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementFinancialAddressActivatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementFinancialAddressFailedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementInboundTransferAvailableEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementInboundTransferBankDebitFailedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementInboundTransferBankDebitProcessingEventNotification(
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
    public function on_V2MoneyManagementInboundTransferBankDebitQueuedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementInboundTransferBankDebitReturnedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementInboundTransferBankDebitSucceededEventNotification(
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
    public function on_V2MoneyManagementOutboundPaymentCanceledEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundPaymentCreatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundPaymentFailedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundPaymentPostedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundPaymentReturnedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundPaymentUpdatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundTransferCanceledEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundTransferCreatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundTransferFailedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundTransferPostedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundTransferReturnedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementOutboundTransferUpdatedEventNotification(
        $handler
    ) {
        $this->register('v2.money_management.outbound_transfer.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.payout_method.updated" event.
     *
     * @param callable(Events\V2MoneyManagementPayoutMethodUpdatedEvent, StripeClient): void $handler Handles v2.money_management.payout_method.updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2MoneyManagementPayoutMethodUpdatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedCreditAvailableEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedCreditFailedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedCreditReturnedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedCreditSucceededEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedDebitCanceledEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedDebitFailedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedDebitPendingEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedDebitSucceededEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementReceivedDebitUpdatedEventNotification(
        $handler
    ) {
        $this->register('v2.money_management.received_debit.updated', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.transaction.created" event.
     *
     * @param callable(Events\V2MoneyManagementTransactionCreatedEvent, StripeClient): void $handler Handles v2.money_management.transaction.created events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function on_V2MoneyManagementTransactionCreatedEventNotification(
        $handler
    ) {
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
    public function on_V2MoneyManagementTransactionUpdatedEventNotification(
        $handler
    ) {
        $this->register('v2.money_management.transaction.updated', $handler);
    }
    // event-router-methods: The end of the section generated from our OpenAPI spec
}
