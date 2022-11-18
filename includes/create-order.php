<?php

require 'vendor/autoload.php';

// // This is your test secret API key.
// \Stripe\Stripe::setApiKey('sk_test_S3nK0A2389Ho2JjPzb8bi1Gw');

// function calculateOrderAmount(array $items): int {
//     // Replace this constant with a calculation of the order's amount
//     // Calculate the order total on the server to prevent
//     // people from directly manipulating the amount on the client
//     return 1400;
// }

// header('Content-Type: application/json');

// try {
//     // retrieve JSON from POST body
//     $jsonStr = file_get_contents('php://input');
//     $jsonObj = json_decode($jsonStr);

//     // Create a PaymentIntent with amount and currency
//     $paymentIntent = \Stripe\PaymentIntent::create([
//         'amount' => calculateOrderAmount($jsonObj->items),
//         'currency' => 'aud',
//         'automatic_payment_methods' => [
//             'enabled' => true,
//         ],
//     ]);

//     $output = [
//         'clientSecret' => $paymentIntent->client_secret,
//     ];

//     echo json_encode($output);
// } catch (Error $e) {
//     http_response_code(500);
//     echo json_encode(['error' => $e->getMessage()]);
// }
