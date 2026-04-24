<?php

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
    // event-handler-methods: The end of the section generated from our OpenAPI spec
}
