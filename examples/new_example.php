<?php

// require 'vendor/autoload.php'; // Make sure to include Composer's autoload file
require '../init.php';

use Stripe\StripeClient;

class NewExample
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function doSomethingGreat()
    {
        print("Hello World\n");
        // $client = new \Stripe\StripeClient($this->apiKey);
    }
}

// Usage
$apiKey = "{{API_KEY}}";

$example = new NewExample($apiKey);
$example->doSomethingGreat();
