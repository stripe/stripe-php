<?php

function authorizeFromEnv()
{
  $apiKey = getenv('STRIPE_API_KEY');
  if (!$apiKey) {
    throw new \Stripe\Error('You need to set STRIPE_API_KEY');
  }
  Stripe\Base::setApiKey($apiKey);
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

$testDir = __DIR__ . '/Stripe/Test';

require_once __DIR__ . '/../lib/Stripe/Autoload.php';
Stripe\Autoload::register();

require_once $testDir . '/TestCase.php';

require_once $testDir . '/ApiRequestorTest.php';
require_once $testDir . '/AuthenticationErrorTest.php';
require_once $testDir . '/CardErrorTest.php';
require_once $testDir . '/ChargeTest.php';
require_once $testDir . '/CustomerTest.php';
require_once $testDir . '/Error.php';
require_once $testDir . '/InvalidRequestErrorTest.php';
require_once $testDir . '/InvoiceTest.php';
require_once $testDir . '/ObjectTest.php';
require_once $testDir . '/Token.php';
require_once $testDir . '/UtilTest.php';
