<?php

require_once('vendor/autoload.php');
require_once('init.php');
require_once('templates/templates.php');

$stripe = new \Stripe\StripeClient($secret_key);

require_once('routes.php');