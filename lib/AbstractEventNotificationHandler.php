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
     * Registers a handler for the "v2.core.account[configuration.money_manager].capability_status_updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.money_manager].capability_status_updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationMoneyManagerCapabilityStatusUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.money_manager].capability_status_updated',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.core.account[configuration.money_manager].updated" event.
     *
     * @param callable(Events\V2CoreAccountIncludingConfigurationMoneyManagerUpdatedEventNotification, StripeClient): void $handler Handles v2.core.account[configuration.money_manager].updated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2CoreAccountIncludingConfigurationMoneyManagerUpdated(
        $handler
    ) {
        $this->register(
            'v2.core.account[configuration.money_manager].updated',
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
     * Registers a handler for the "v2.core.approval_request.approved" event.
     *
     * @param callable(Events\V2CoreApprovalRequestApprovedEventNotification, StripeClient): void $handler Handles v2.core.approval_request.approved events
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
     * @param callable(Events\V2CoreApprovalRequestCanceledEventNotification, StripeClient): void $handler Handles v2.core.approval_request.canceled events
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
     * @param callable(Events\V2CoreApprovalRequestCreatedEventNotification, StripeClient): void $handler Handles v2.core.approval_request.created events
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
     * @param callable(Events\V2CoreApprovalRequestExpiredEventNotification, StripeClient): void $handler Handles v2.core.approval_request.expired events
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
     * @param callable(Events\V2CoreApprovalRequestFailedEventNotification, StripeClient): void $handler Handles v2.core.approval_request.failed events
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
     * @param callable(Events\V2CoreApprovalRequestRejectedEventNotification, StripeClient): void $handler Handles v2.core.approval_request.rejected events
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
     * @param callable(Events\V2CoreApprovalRequestSucceededEventNotification, StripeClient): void $handler Handles v2.core.approval_request.succeeded events
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
     * @param callable(Events\V2CoreBatchJobBatchFailedEventNotification, StripeClient): void $handler Handles v2.core.batch_job.batch_failed events
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
     * @param callable(Events\V2CoreBatchJobCanceledEventNotification, StripeClient): void $handler Handles v2.core.batch_job.canceled events
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
     * @param callable(Events\V2CoreBatchJobCompletedEventNotification, StripeClient): void $handler Handles v2.core.batch_job.completed events
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
     * @param callable(Events\V2CoreBatchJobCreatedEventNotification, StripeClient): void $handler Handles v2.core.batch_job.created events
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
     * @param callable(Events\V2CoreBatchJobReadyForUploadEventNotification, StripeClient): void $handler Handles v2.core.batch_job.ready_for_upload events
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
     * @param callable(Events\V2CoreBatchJobTimeoutEventNotification, StripeClient): void $handler Handles v2.core.batch_job.timeout events
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
     * @param callable(Events\V2CoreBatchJobUpdatedEventNotification, StripeClient): void $handler Handles v2.core.batch_job.updated events
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
     * @param callable(Events\V2CoreBatchJobUploadTimeoutEventNotification, StripeClient): void $handler Handles v2.core.batch_job.upload_timeout events
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
     * @param callable(Events\V2CoreBatchJobValidatingEventNotification, StripeClient): void $handler Handles v2.core.batch_job.validating events
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
     * @param callable(Events\V2CoreBatchJobValidationFailedEventNotification, StripeClient): void $handler Handles v2.core.batch_job.validation_failed events
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
     * @param callable(Events\V2CoreEventDestinationPingEventNotification, StripeClient): void $handler Handles v2.core.event_destination.ping events
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
     * @param callable(Events\V2CoreHealthEventGenerationFailureResolvedEventNotification, StripeClient): void $handler Handles v2.core.health.event_generation_failure.resolved events
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
     * @param callable(Events\V2DataReportingQueryRunCreatedEventNotification, StripeClient): void $handler Handles v2.data.reporting.query_run.created events
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
     * @param callable(Events\V2DataReportingQueryRunFailedEventNotification, StripeClient): void $handler Handles v2.data.reporting.query_run.failed events
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
     * @param callable(Events\V2DataReportingQueryRunSucceededEventNotification, StripeClient): void $handler Handles v2.data.reporting.query_run.succeeded events
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
     * @param callable(Events\V2DataReportingQueryRunUpdatedEventNotification, StripeClient): void $handler Handles v2.data.reporting.query_run.updated events
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
     * @param callable(Events\V2ExtendWorkflowRunFailedEventNotification, StripeClient): void $handler Handles v2.extend.workflow_run.failed events
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
     * @param callable(Events\V2ExtendWorkflowRunStartedEventNotification, StripeClient): void $handler Handles v2.extend.workflow_run.started events
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
     * @param callable(Events\V2ExtendWorkflowRunSucceededEventNotification, StripeClient): void $handler Handles v2.extend.workflow_run.succeeded events
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
     * @param callable(Events\V2MoneyManagementAdjustmentCreatedEventNotification, StripeClient): void $handler Handles v2.money_management.adjustment.created events
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
     * @param callable(Events\V2MoneyManagementFinancialAccountCreatedEventNotification, StripeClient): void $handler Handles v2.money_management.financial_account.created events
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
     * @param callable(Events\V2MoneyManagementFinancialAccountUpdatedEventNotification, StripeClient): void $handler Handles v2.money_management.financial_account.updated events
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
     * @param callable(Events\V2MoneyManagementFinancialAddressActivatedEventNotification, StripeClient): void $handler Handles v2.money_management.financial_address.activated events
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
     * @param callable(Events\V2MoneyManagementFinancialAddressFailedEventNotification, StripeClient): void $handler Handles v2.money_management.financial_address.failed events
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
     * @param callable(Events\V2MoneyManagementInboundTransferAvailableEventNotification, StripeClient): void $handler Handles v2.money_management.inbound_transfer.available events
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
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitFailedEventNotification, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_failed events
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
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitProcessingEventNotification, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_processing events
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
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitQueuedEventNotification, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_queued events
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
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitReturnedEventNotification, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_returned events
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
     * @param callable(Events\V2MoneyManagementInboundTransferBankDebitSucceededEventNotification, StripeClient): void $handler Handles v2.money_management.inbound_transfer.bank_debit_succeeded events
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
     * @param callable(Events\V2MoneyManagementOutboundPaymentCanceledEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_payment.canceled events
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
     * @param callable(Events\V2MoneyManagementOutboundPaymentCreatedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_payment.created events
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
     * @param callable(Events\V2MoneyManagementOutboundPaymentFailedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_payment.failed events
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
     * @param callable(Events\V2MoneyManagementOutboundPaymentPostedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_payment.posted events
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
     * @param callable(Events\V2MoneyManagementOutboundPaymentReturnedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_payment.returned events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentReturned($handler)
    {
        $this->register('v2.money_management.outbound_payment.returned', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.under_review" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentUnderReviewEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_payment.under_review events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundPaymentUnderReview($handler)
    {
        $this->register(
            'v2.money_management.outbound_payment.under_review',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_payment.updated" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundPaymentUpdatedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_payment.updated events
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
     * @param callable(Events\V2MoneyManagementOutboundTransferCanceledEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_transfer.canceled events
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
     * @param callable(Events\V2MoneyManagementOutboundTransferCreatedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_transfer.created events
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
     * @param callable(Events\V2MoneyManagementOutboundTransferFailedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_transfer.failed events
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
     * @param callable(Events\V2MoneyManagementOutboundTransferPostedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_transfer.posted events
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
     * @param callable(Events\V2MoneyManagementOutboundTransferReturnedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_transfer.returned events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferReturned($handler)
    {
        $this->register('v2.money_management.outbound_transfer.returned', $handler);
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.under_review" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferUnderReviewEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_transfer.under_review events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2MoneyManagementOutboundTransferUnderReview($handler)
    {
        $this->register(
            'v2.money_management.outbound_transfer.under_review',
            $handler
        );
    }

    /**
     * Registers a handler for the "v2.money_management.outbound_transfer.updated" event.
     *
     * @param callable(Events\V2MoneyManagementOutboundTransferUpdatedEventNotification, StripeClient): void $handler Handles v2.money_management.outbound_transfer.updated events
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
     * @param callable(Events\V2MoneyManagementPayoutMethodCreatedEventNotification, StripeClient): void $handler Handles v2.money_management.payout_method.created events
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
     * @param callable(Events\V2MoneyManagementPayoutMethodUpdatedEventNotification, StripeClient): void $handler Handles v2.money_management.payout_method.updated events
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
     * @param callable(Events\V2MoneyManagementReceivedCreditAvailableEventNotification, StripeClient): void $handler Handles v2.money_management.received_credit.available events
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
     * @param callable(Events\V2MoneyManagementReceivedCreditFailedEventNotification, StripeClient): void $handler Handles v2.money_management.received_credit.failed events
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
     * @param callable(Events\V2MoneyManagementReceivedCreditReturnedEventNotification, StripeClient): void $handler Handles v2.money_management.received_credit.returned events
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
     * @param callable(Events\V2MoneyManagementReceivedCreditSucceededEventNotification, StripeClient): void $handler Handles v2.money_management.received_credit.succeeded events
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
     * @param callable(Events\V2MoneyManagementReceivedDebitCanceledEventNotification, StripeClient): void $handler Handles v2.money_management.received_debit.canceled events
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
     * @param callable(Events\V2MoneyManagementReceivedDebitFailedEventNotification, StripeClient): void $handler Handles v2.money_management.received_debit.failed events
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
     * @param callable(Events\V2MoneyManagementReceivedDebitPendingEventNotification, StripeClient): void $handler Handles v2.money_management.received_debit.pending events
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
     * @param callable(Events\V2MoneyManagementReceivedDebitSucceededEventNotification, StripeClient): void $handler Handles v2.money_management.received_debit.succeeded events
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
     * @param callable(Events\V2MoneyManagementReceivedDebitUpdatedEventNotification, StripeClient): void $handler Handles v2.money_management.received_debit.updated events
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
     * @param callable(Events\V2MoneyManagementTransactionCreatedEventNotification, StripeClient): void $handler Handles v2.money_management.transaction.created events
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
     * @param callable(Events\V2MoneyManagementTransactionUpdatedEventNotification, StripeClient): void $handler Handles v2.money_management.transaction.updated events
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
     * @param callable(Events\V2OrchestratedCommerceAgreementConfirmedEventNotification, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.confirmed events
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
     * @param callable(Events\V2OrchestratedCommerceAgreementCreatedEventNotification, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.created events
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
     * @param callable(Events\V2OrchestratedCommerceAgreementPartiallyConfirmedEventNotification, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.partially_confirmed events
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
     * @param callable(Events\V2OrchestratedCommerceAgreementTerminatedEventNotification, StripeClient): void $handler Handles v2.orchestrated_commerce.agreement.terminated events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2OrchestratedCommerceAgreementTerminated($handler)
    {
        $this->register('v2.orchestrated_commerce.agreement.terminated', $handler);
    }

    /**
     * Registers a handler for the "v2.signals.account_evaluation.complete" event.
     *
     * @param callable(Events\V2SignalsAccountEvaluationCompleteEventNotification, StripeClient): void $handler Handles v2.signals.account_evaluation.complete events
     *
     * @throws Exception\InvalidArgumentException if this event type is already registered
     * @throws Exception\BadMethodCallException if the `.handle()` method has already been called on this handler.
     */
    public function onV2SignalsAccountEvaluationComplete($handler)
    {
        $this->register('v2.signals.account_evaluation.complete', $handler);
    }
    // event-handler-methods: The end of the section generated from our OpenAPI spec
}
