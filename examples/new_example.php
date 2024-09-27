<?php

// require 'vendor/autoload.php'; // Make sure to include Composer's autoload file
require '../init.php';

class new_example
{
    private $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function doSomethingGreat()
    {
        echo "Hello World\n";
        // $client = new \Stripe\StripeClient($this->apiKey);
    }
}

// Usage
$apiKey = '{{API_KEY}}';

$example = new NewExample($apiKey);
$example->doSomethingGreat();
