<?php

require 'vendor/autoload.php'; // Make sure to include Composer's autoload file

class meter_event_stream
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

$manager = new MeterEventManager($apiKey);
$manager->sendMeterEvent([
    'event_name' => 'alpaca_ai_tokens',
    'payload' => [
        'stripe_customer_id' => $customerId,
        'value' => '26',
    ],
]);
