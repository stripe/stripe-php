<?php

// Tested on PHP 5.2, 5.3

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
  throw new Exception('Stripe needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Stripe needs the JSON PHP extension.');
}

abstract class Stripe {
  public static $apiKey;
  public static $apiBase = 'https://api.stripe.com/v1';
  const VERSION = '1.5.1';
}

// Utilities
require_once(dirname(__FILE__) . '/Stripe/Util.php');
require_once(dirname(__FILE__) . '/Stripe/Util/Set.php');

// Errors
require_once(dirname(__FILE__) . '/Stripe/Error.php');
require_once(dirname(__FILE__) . '/Stripe/Error/Api.php');
require_once(dirname(__FILE__) . '/Stripe/Error/ApiConnection.php');
require_once(dirname(__FILE__) . '/Stripe/Error/Authentication.php');
require_once(dirname(__FILE__) . '/Stripe/Error/Card.php');
require_once(dirname(__FILE__) . '/Stripe/Error/InvalidRequest.php');

// Plumbing
require_once(dirname(__FILE__) . '/Stripe/Object.php');
require_once(dirname(__FILE__) . '/Stripe/ApiRequestor.php');
require_once(dirname(__FILE__) . '/Stripe/ApiResource.php');

// Stripe API Resources
require_once(dirname(__FILE__) . '/Stripe/Charge.php');
require_once(dirname(__FILE__) . '/Stripe/Customer.php');
require_once(dirname(__FILE__) . '/Stripe/Invoice.php');
require_once(dirname(__FILE__) . '/Stripe/InvoiceItem.php');

?>