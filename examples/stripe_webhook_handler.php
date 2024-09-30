<?php

require 'vendor/autoload.php';

$api_key = getenv('STRIPE_API_KEY');
$webhook_secret = getenv('WEBHOOK_SECRET');

$app = new \Slim\App();
$client = new \Stripe\StripeClient($api_key);

$app->post('/webhook', function ($request, $response) use ($client, $webhook_secret) {
    $webhook_body = $request->getBody()->getContents();
    $sig_header = $request->getHeaderLine('Stripe-Signature');

    try {
        $thin_event = $client->parseThinEvent($webhook_body, $sig_header, $webhook_secret);

        // Fetch the event data to understand the failure
        $event = $client->v2->core->events->retrieve($thin_event->id);
        if ($event instanceof \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent) {
            $meter = $event->fetchRelatedObject();
            $meter_id = $meter->id;

            // Record the failures and alert your team
            // Add your logic here
        }

        return $response->withStatus(200);
    } catch (\Exception $e) {
        return $response->withStatus(400)->withJson(['error' => $e->getMessage()]);
    }
});

$app->run();