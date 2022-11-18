<?php

require_once('vendor/autoload.php');
require_once('init.php');

$stripe = new \Stripe\StripeClient('sk_test_S3nK0A2389Ho2JjPzb8bi1Gw');

$stripe->paymentIntents->confirm(
    'pi_3M5UBmCwnHW6CxPB1PTLkmEM',
    ['payment_method' => 'pm_card_visa'],
  );
