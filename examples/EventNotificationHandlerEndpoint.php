<?php

/**
 * EventNotificationHandlerEndpoint.php - receive and process event notifications (AKA thin events) like "v1.billing.meter.error_report_triggered" using EventNotificationHandler.
 * In this example, we:
 *     - write a fallback callback to handle unrecognized event notifications
 *     - create a StripeClient called client
 *     - Initialize an EventNotificationHandler with the client, webhook secret, and fallback callback
 *     - register a preHandle hook that deduplicates events by id before any callback runs
 *     - register a specific handler for the "v1.billing.meter.error_report_triggered" event notification type
 *     - use handler->handle() to process the received notification webhook body.
 */
require 'vendor/autoload.php';

$api_key = getenv('STRIPE_API_KEY');
$webhook_secret = getenv('WEBHOOK_SECRET');

$app = new Slim\App();
$client = new Stripe\StripeClient($api_key);

// Webhooks can be delivered more than once, so we track ids we've already
// processed. In production, back this with something durable and shared
// across processes (e.g. Redis or a database table) instead of an in-memory array.
$processed_event_ids = [];

// Runs before any registered callback. Returning false here skips handling
// entirely for this delivery, which is useful for deduplicating webhooks.
$skip_already_processed = static function ($event_notification, $client) use (&$processed_event_ids) {
    if (\in_array($event_notification->id, $processed_event_ids, true)) {
        echo "Skipping duplicate delivery of {$event_notification->id}\n";

        return false;
    }

    $processed_event_ids[] = $event_notification->id;

    return true;
};

// can be anywhere in your codebase with access to the `handler`
$handle_meter_error = static function ($event_notification, $client) {
    $meter = $event_notification->fetchRelatedObject();
    echo "Handling V1BillingMeterErrorReportTriggeredEventNotification for meter: {$meter->name}\n";
};

$handler = $client->notificationHandler($webhook_secret, static function ($event_notification, $client, $details) {
    echo "Received event notification of type {$event_notification->type}\n";
});

$handler->preHandle($skip_already_processed);
$handler->onV1BillingMeterErrorReportTriggered($handle_meter_error);

// Handles events delivered through a channel that has already authenticated them, such as
// AWS EventBridge or Azure Event Grid. Those payloads carry no Stripe-Signature header, so
// this handler skips verification. Callbacks are registered separately from the one above.
$unverified_handler = $client->notificationHandlerWithoutVerification(static function ($event_notification, $client, $details) {
    echo "Received event notification of type {$event_notification->type}\n";
});

$unverified_handler->preHandle($skip_already_processed);
$unverified_handler->onV1BillingMeterErrorReportTriggered($handle_meter_error);

$app->post('/webhook', static function ($request, $response) use ($handler) {
    $webhook_body = $request->getBody()->getContents();
    $sig_header = $request->getHeaderLine('Stripe-Signature');

    try {
        $handler->handle($webhook_body, $sig_header);

        return $response->withStatus(200);
    } catch (Exception $e) {
        return $response->withStatus(400)->withJson(['error' => $e->getMessage()]);
    }
});

$app->post('/webhook-from-cloud-provider', static function ($request, $response) use ($unverified_handler) {
    // handle() takes only the body here; there's no signature to check
    try {
        $unverified_handler->handle($request->getBody()->getContents());

        return $response->withStatus(200);
    } catch (Exception $e) {
        return $response->withStatus(400)->withJson(['error' => $e->getMessage()]);
    }
});

$app->run();
