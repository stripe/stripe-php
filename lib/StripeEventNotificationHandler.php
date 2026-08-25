<?php

namespace Stripe;

class StripeEventNotificationHandler extends AbstractEventNotificationHandler
{
    /** @var string */
    private $webhookSecret;

    /**
     * Constructor for StripeEventNotificationHandler.
     *
     * @param StripeClient $client The Stripe client to use for API interactions
     * @param string $webhookSecret The webhook secret for verifying signatures
     * @param callable(V2\Core\EventNotification, StripeClient, UnhandledNotificationDetails): void $fallbackCallback A callback that's invoked for unhandled events
     */
    public function __construct($client, $webhookSecret, $fallbackCallback)
    {
        if (empty($webhookSecret)) {
            throw new Exception\InvalidArgumentException('webhookSecret must be a non-empty string');
        }

        parent::__construct($client, $fallbackCallback);
        $this->webhookSecret = $webhookSecret;
    }

    /**
     * Creates a handler that processes events without webhook signature verification.
     * Intended for pre-authenticated channels like AWS EventBridge or Azure Event Grid.
     *
     * @param StripeClient $client The Stripe client to use for API interactions
     * @param callable(V2\Core\EventNotification, StripeClient, UnhandledNotificationDetails): void $fallbackCallback A callback that's invoked for unhandled events
     *
     * @return StripeEventNotificationHandlerWithoutVerification
     */
    public static function withoutVerification($client, $fallbackCallback)
    {
        return new StripeEventNotificationHandlerWithoutVerification($client, $fallbackCallback);
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

        $this->dispatch($notif);
    }
}
