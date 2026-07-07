<?php

/**
 * This is a simple example to get and list customers.
 *
 * It is used by lint-test to ensure that the iterated value type is not resolved to mixed
 */
require 'vendor/autoload.php'; // Make sure to include Composer's autoload file
// Use this require statement to import the SDK from this repo folder
// require '../init.php';

class IteratorExample
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function iterateOverCustomers(): void
    {
        $client = new Stripe\StripeClient($this->apiKey);
        $customers = $client->customers->all();
        foreach ($customers as $customer) {
            echo $customer->email;
        }
        foreach ($customers->autoPagingIterator() as $customer) {
            echo $customer->id;
        }
    }
}

// Usage
$apiKey = '{{API_KEY}}';

$example = new IteratorExample($apiKey);
$example->iterateOverCustomers();
