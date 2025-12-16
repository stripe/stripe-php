<?php

/**
 * event_notification_handler_endpoint.py - receive and process event notifications (AKA thin events) like "v1.billing.meter.error_report_triggered" using EventNotificationHandler.
 * In this example, we:
 *     - write a fallback callback to handle unrecognized event notifications
 *     - create a StripeClient called client
 *     - Initialize an EventNotificationHandler with the client, webhook secret, and fallback callback
 *     - register a specific handler for the "v1.billing.meter.error_report_triggered" event notification type
 *     - use handler->handle() to process the received notification webhook body
 */
require 'vendor/autoload.php';

$api_key = getenv('STRIPE_API_KEY');
$webhook_secret = getenv('WEBHOOK_SECRET');

$app = new Slim\App();
$client = new Stripe\StripeClient($api_key);

$handler = $client->notificationHandler($webhook_secret, function ($event_notification, $client, $details) {
    echo "Received event notification of type {$event_notification->type}\n";
});

$handler->onV1BillingMeterErrorReportTriggered(function ($event_notification, $client) {
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

$app->run();
