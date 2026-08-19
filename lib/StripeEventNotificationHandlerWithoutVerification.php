<?php

namespace Stripe;

/**
 * A variant of StripeEventNotificationHandler that parses events without
 * verifying webhook signatures. Intended for pre-authenticated channels
 * like AWS EventBridge or Azure Event Grid.
 *
 * Because this is a sibling of StripeEventNotificationHandler rather than a subclass,
 * handle() takes only the payload; there is no vestigial signature parameter.
 *
 * Prefer StripeEventNotificationHandler::withoutVerification() or
 * $client->notificationHandlerWithoutVerification() to construct one.
 */
class StripeEventNotificationHandlerWithoutVerification extends AbstractEventNotificationHandler
{
    /**
     * Handles an incoming webhook payload without signature verification.
     *
     * @param string $payload The raw webhook payload
     *
     * @return void
     */
    public function handle($payload)
    {
        $this->hasHandledEvents = true;

        $notif = $this->client->parseEventNotificationWithoutVerification($payload);

        $this->dispatch($notif);
    }
}
