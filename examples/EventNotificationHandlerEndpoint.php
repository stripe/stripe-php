<?php

/**
 * event_notification_handler_endpoint.py - receive and process event notifications (AKA thin events) like "v1.billing.meter.error_report_triggered" using EventNotificationHandler.
 * In this example, we:
 *     - write a fallback callback to handle unrecognized event notifications
 *     - create a StripeClient called client
 *     - Initialize an EventNotificationHandler with the client, webhook secret, and fallback callback
 *     - register a specific handler for the "v1.billing.meter.error_report_triggered" event notification type
 *     - register a preHandle hook that skips events we've already processed
 *     - use handler->handle() to process the received notification webhook body.
 */
require 'vendor/autoload.php';

$api_key = getenv('STRIPE_API_KEY');
$webhook_secret = getenv('WEBHOOK_SECRET');

$app = new Slim\App();
$client = new Stripe\StripeClient($api_key);

// Stripe can deliver the same event more than once, and our docs warn against processing one
// twice. A preHandle hook is a single place to enforce that: returning false stops handling
// before any callback below runs, including the fallback. In a real integration this would be
// backed by a database or cache rather than an in-memory array.
$processed_event_ids = [];
$skip_already_processed = static function ($event_notification, $client) use (&$processed_event_ids) {
    if (\in_array($event_notification->id, $processed_event_ids, true)) {
        echo "Skipping duplicate delivery of {$event_notification->id}\n";

        return false;
    }

    $processed_event_ids[] = $event_notification->id;

    return true;
};

$handler = $client->notificationHandler($webhook_secret, static function ($event_notification, $client, $details) {
    echo "Received event notification of type {$event_notification->type}\n";
});

$handler->preHandle($skip_already_processed);

$handler->onV1BillingMeterErrorReportTriggered(static function ($event_notification, $client) {
    $meter = $event_notification->fetchRelatedObject();
    echo "Handling V1BillingMeterErrorReportTriggeredEventNotification for meter: {$meter->name}\n";
});

// Handles events delivered through a channel that has already authenticated them, such as
// AWS EventBridge or Azure Event Grid. Those payloads carry no Stripe-Signature header, so
// this handler skips verification. Callbacks are registered separately from the one above.
$unverified_handler = $client->notificationHandlerWithoutVerification(static function ($event_notification, $client, $details) {
    echo "Received event notification of type {$event_notification->type}\n";
});

$unverified_handler->preHandle($skip_already_processed);

$unverified_handler->onV1BillingMeterErrorReportTriggered(static function ($event_notification, $client) {
    $meter = $event_notification->fetchRelatedObject();
    echo "Handling V1BillingMeterErrorReportTriggeredEventNotification for meter: {$meter->name}\n";
});

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
