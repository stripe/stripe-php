<?php

require 'vendor/autoload.php';

// Create Customer from Form Submission

$full_name = $_POST['full_name'];
$email_address = $_POST['email_address'];
$product_name = $_POST['product_name'];

if(!empty($_COOKIE['customerEmail']) && $_COOKIE['customerEmail'] != $email_address){

   header('Location: /end-session');

}

$stripe = new \Stripe\StripeClient($secret_key);

$customer = $stripe->customers->create([
    'description' => $full_name,
    'email' => $email_address,
]);

$customerEmail = $customer->email;
$customerID = $customer->id;

// Create Subscription with customer data generated above.
// Create session for subscription creation.

$customerID = '';
$customerEmail = '';
$productName = $product_name;

setcookie('customerID', $customer->id, time()+60*60*24, '/');
setcookie('customerEmail', $customer->email, time()+60*60*24, '/');
setcookie('customerDetails', $customer->description, time()+60*60*24, '/');
setcookie('productName', $product_name, time()+60*60*24, '/');

$customerID = $_COOKIE['customerID'];
$customerEmail = $_COOKIE['customerEmail'];
$productName = $_COOKIE['productName'];

if(empty($customerEmail)){
    header("Location: /select-plan");
}


