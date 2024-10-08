<?php

/**
 * This is a template for defining new examples.  It is not intended to be used directly.
 *
 * <describe what this example does>
 *
 * In this example, we:
 *   - <key step 1>
 *   - <key step 2
 *   - ...
 *
 * <describe assumptions about the user's stripe account, environment, or configuration;
 * or things to watch out for when running>
 */
require 'vendor/autoload.php'; // Make sure to include Composer's autoload file
// Use this require statement to import the SDK from this repo folder
// require '../init.php';

class ExampleTemplate
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

$example = new ExampleTemplate($apiKey);
$example->doSomethingGreat();
