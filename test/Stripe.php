<?php

echo "Running the Stripe PHP bindings test suite.\n".
     "If you're trying to use the Stripe PHP bindings you'll probably want ".
     "to require('lib/Stripe.php'); instead of this file\n";

function authorizeFromEnv()
{
  $apiKey = getenv('STRIPE_API_KEY');
  if (!$apiKey)
    $apiKey = "tGN0bIwXnHdwOa85VABjPdSn8nWY7G7I";
  Stripe::setApiKey($apiKey);
}

$testURI = '/simpletest/autorun.php';
$ok = @include_once(dirname(__FILE__).$testURI);
if (!$ok) {
  $ok = @include_once(dirname(__FILE__).'/../vendor/simpletest'.$testURI);
}
if (!$ok) {
  echo "MISSING DEPENDENCY: The Stripe API test cases depend on SimpleTest. ".
       "Download it at <http://www.simpletest.org/>, and either install it ".
       "in your PHP include_path or put it in the test/ directory.\n";
  exit(1);
}

// Throw an exception on any error
function exception_error_handler($errno, $errstr, $errfile, $errline)
{
  throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}
set_error_handler('exception_error_handler');
error_reporting(E_ALL | E_STRICT);

require_once(dirname(__FILE__) . '/../lib/Stripe.php');

require_once(dirname(__FILE__) . '/Stripe/TestCase.php');

require_once(dirname(__FILE__) . '/Stripe/ApiRequestorTest.php');
require_once(dirname(__FILE__) . '/Stripe/AuthenticationErrorTest.php');
require_once(dirname(__FILE__) . '/Stripe/CardErrorTest.php');
require_once(dirname(__FILE__) . '/Stripe/AccountTest.php');
require_once(dirname(__FILE__) . '/Stripe/BalanceTest.php');
require_once(dirname(__FILE__) . '/Stripe/BalanceTransactionTest.php');
require_once(dirname(__FILE__) . '/Stripe/ChargeTest.php');
require_once(dirname(__FILE__) . '/Stripe/CouponTest.php');
require_once(dirname(__FILE__) . '/Stripe/CustomerTest.php');
require_once(dirname(__FILE__) . '/Stripe/DiscountTest.php');
require_once(dirname(__FILE__) . '/Stripe/Error.php');
require_once(dirname(__FILE__) . '/Stripe/InvalidRequestErrorTest.php');
require_once(dirname(__FILE__) . '/Stripe/InvoiceTest.php');
require_once(dirname(__FILE__) . '/Stripe/ObjectTest.php');
require_once(dirname(__FILE__) . '/Stripe/PlanTest.php');
require_once(dirname(__FILE__) . '/Stripe/SubscriptionTest.php');
require_once(dirname(__FILE__) . '/Stripe/Token.php');
require_once(dirname(__FILE__) . '/Stripe/TransferTest.php');
require_once(dirname(__FILE__) . '/Stripe/RecipientTest.php');
require_once(dirname(__FILE__) . '/Stripe/RefundTest.php');
require_once(dirname(__FILE__) . '/Stripe/ApplicationFeeTest.php');
require_once(dirname(__FILE__) . '/Stripe/UtilTest.php');
