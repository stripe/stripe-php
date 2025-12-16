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
            // there's basic info about the related object in the notification
            echo "Meter with id {$event_notification->related_object->id} reported an error\n";

            // or you can fetch the full object form the API for more details
            $meter = $event_notification->fetchRelatedObject();
            echo "Meter {$meter->display_name} ({$meter->id}) had a problem\n";

            // And you can always fetch the full event:
            $event = $event_notification->fetchEvent();
            echo "More info: {$event->data->developer_message_summary}\n";
        } elseif ($event_notification instanceof Stripe\Events\UnknownEventNotification) {
            // Events that were introduced after this SDK version release are
            // represented as `UnknownEventNotification`s.
            // They're valid, the SDK just doesn't have corresponding classes for them.
            // You must match on the "type" property instead.
            if ('some.new.event' === $event_notification->type) {
                // handle it the same way as above
            }
        }

        return $response->withStatus(200);
    } catch (Exception $e) {
        return $response->withStatus(400)->withJson(['error' => $e->getMessage()]);
    }
});

$app->run();
