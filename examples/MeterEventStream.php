<?php

/**
 * Use the high-throughput MeterEventStream to report create billing meter events.
 *
 * In this example, we:
 *   - create a meter event session and store the session's authentication token
 *   - define an event with a payload
 *   - use the meterEventStream service to create an event stream that reports this event
 *
 * This example expects a billing meter with an event_name of 'alpaca_ai_tokens'.  If you have
 * a different meter event name, you can change it before running this example.
 */
require 'vendor/autoload.php'; // Make sure to include Composer's autoload file

class MeterEventStream
{
    private $apiKey;
    private $meterEventSession;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->meterEventSession = null;
    }

    private function refreshMeterEventSession()
    {
        // Check if session is null or expired
        if (
            null === $this->meterEventSession
            || $this->meterEventSession->expires_at <= time()
        ) {
            // Create a new meter event session in case the existing session expired
            $client = new \Stripe\StripeClient($this->apiKey);
            $this->meterEventSession = $client->v2->billing->meterEventSession->create();
        }
    }

    public function sendMeterEvent($meterEvent)
    {
        // Refresh the meter event session, if necessary
        $this->refreshMeterEventSession();

        // Create a meter event with the current session's authentication token
        $client = new \Stripe\StripeClient($this->meterEventSession->authentication_token);
        $client->v2->billing->meterEventStream->create([
            'events' => [$meterEvent],
        ]);
    }
}

// Usage
$apiKey = '{{API_KEY}}';
$customerId = '{{CUSTOMER_ID}}';

$manager = new MeterEventStream($apiKey);
$manager->sendMeterEvent([
    'event_name' => 'alpaca_ai_tokens',
    'payload' => [
        'stripe_customer_id' => $customerId,
        'value' => '26',
    ],
]);
