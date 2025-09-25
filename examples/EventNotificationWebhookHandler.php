<?php

/**
 * Receive and process event notifications like the v1.billing.meter.error_report_triggered event.
 *
 * In this example, we:
 *   - use parseEventNotification to parse the received EventNotification body
 *   - call StripeClient.v2.core.events.retrieve to retrieve the full event object
 *   - if it is a V1BillingMeterErrorReportTriggeredEvent event type, call fetchRelatedObject
 *     to retrieve the Billing Meter object associated with the event.
 */
require 'vendor/autoload.php';

$api_key = getenv('STRIPE_API_KEY');
$webhook_secret = getenv('WEBHOOK_SECRET');

$app = new Slim\App();
$client = new Stripe\StripeClient($api_key);

$app->post('/webhook', static function ($request, $response) use ($client, $webhook_secret) {
    $webhook_body = $request->getBody()->getContents();
    $sig_header = $request->getHeaderLine('Stripe-Signature');

    try {
        $event_notification = $client->parseEventNotification($webhook_body, $sig_header, $webhook_secret);

        // check what type of event notification we have
        if ($event_notification instanceof Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification) {
            $meter = $event_notification->fetchRelatedObject();
            $meter_id = $meter->id;

            // Record the failures and alert your team
            // Add your logic here

            // can fetch full event w/ data
            $event = $event_notification->fetchEvent();
            // data is fully typed
            $event->data->developer_message_summary;
        }

        return $response->withStatus(200);
    } catch (Exception $e) {
        return $response->withStatus(400)->withJson(['error' => $e->getMessage()]);
    }
});

$app->run();
