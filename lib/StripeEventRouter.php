<?php

namespace Stripe;

const UNKNOWN_EVENT_TYPE_KEY = '__unknown_event_type';

class UnhandledNotificationDetails
{
    public bool $isKnownType;

    public function __construct(bool $isKnownType)
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

        $originalContext = $this->client->getStripeContext();
        try {
            // TODO: bind the event's context to the client
            $this->client->setStripeContext($notif->context);

            if (isset($this->registeredHandlers[$eventType])) {
                \call_user_func($this->registeredHandlers[$eventType], $notif, $this->client);
            } else {
                \call_user_func($this->onUnhandledHandler, $notif, $this->client, new UnhandledNotificationDetails(!($notif instanceof Events\UnknownEventNotification)));
            }
        } finally {
            // Clear references to the client to avoid memory leaks
            $this->client->setStripeContext($originalContext);
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
    // event-handler-methods: The end of the section generated from our OpenAPI spec
}
