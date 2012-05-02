<?php

function authorizeFromEnv()
{
  $apiKey = getenv('STRIPE_API_KEY');
  if (!$apiKey)
    throw new Stripe_Error('You need to set STRIPE_API_KEY');
  Stripe::setApiKey($apiKey);
}

if (!getenv('STRIPE_API_KEY')) {
  echo "MISSING KEY: Provide your Stripe API KEY to this test suite by ".
       "setting the environmental variable STRIPE_API_KEY. For example:\n".
       "    $ STRIPE_API_KEY=<your_key> php -f Stripe.php\n";
  exit(1);
}

$ok = @include_once(__DIR__.'/simpletest/autorun.php');
if (!$ok) {
  $ok = @include_once(__DIR__.'/../vendor/simpletest/simpletest/autorun.php');
}
if (!$ok) {
  echo "MISSING DEPENDENCY: The Stripe API test cases depend on SimpleTest. ".
       "Download it at <http://www.simpletest.org/>, and either install it ".
       "in your PHP include_path or put it in the test/ directory.\n";
  exit(1);
}

require_once(__DIR__ . '/../lib/Base.php');

require_once(__DIR__ . '/Stripe/TestCase.php');

require_once(__DIR__ . '/Stripe/ApiRequestorTest.php');
require_once(__DIR__ . '/Stripe/AuthenticationErrorTest.php');
require_once(__DIR__ . '/Stripe/CardErrorTest.php');
require_once(__DIR__ . '/Stripe/ChargeTest.php');
require_once(__DIR__ . '/Stripe/CustomerTest.php');
require_once(__DIR__ . '/Stripe/Error.php');
require_once(__DIR__ . '/Stripe/InvalidRequestErrorTest.php');
require_once(__DIR__ . '/Stripe/InvoiceTest.php');
require_once(__DIR__ . '/Stripe/ObjectTest.php');
require_once(__DIR__ . '/Stripe/Token.php');
require_once(__DIR__ . '/Stripe/UtilTest.php');
