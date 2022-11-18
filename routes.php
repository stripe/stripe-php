<?php

// ROUTES

// ##################################################
// ##################################################
// ##################################################

// Static GET
// In the URL -> http://localhost
// The output -> Index

get('/', 'views/create-customer.php');
get('/select-plan', 'views/plan.php');
get('/checkout', 'views/checkout.php');
get('/order', 'views/order.php');
get('/success', 'views/success.php');
get('/end-session', 'views/end-session.php');
get('/assets/css/addons.css', 'assets/css/addons.php');
get('/assets/js/addons.js', 'assets/js/addons.php');

// Dynamic GET. Example with 1 variable
// The $id will be available in user.php
get('/user/$id', 'views/user');

// Dynamic GET. Example with 2 variables
// The $name will be available in full_name.php
// The $last_name will be available in full_name.php
// In the browser point to: localhost/user/X/Y
get('/user/$name/$last_name', 'views/full_name.php');

// Dynamic GET. Example with 2 variables with static
// In the URL -> http://localhost/product/shoes/color/blue
// The $type will be available in product.php
// The $color will be available in product.php
get('/product/$type/color/$color', 'product.php');

// A route with a callback
get('/callback', function ( ) {

  echo 'Callback executed';

});

// A route with a callback passing a variable
// To run this route, in the browser type:
// http://localhost/user/A
get('/callback/$name', function($name){
  echo "Callback executed. The name is $name";
});

// A route with a callback passing 2 variables
// To run this route, in the browser type:
// http://localhost/callback/A/B
get('/callback/$name/$last_name', function($name, $last_name){
  echo "Callback executed. The full name is $name $last_name";
});

// POST
// Create Customer
post('/select-plan', function(){

  global $secret_key;

  require_once('includes/create-customer.php');

  require_once('views/plan.php');

});

post('/order', 'views/order.php');
post('/payment', 'includes/create-order.php');
get('/payment', 'includes/create-order.php');

// ##################################################
// ##################################################
// ##################################################
// any can be used for GETs or POSTs

// For GET or POST
// The 404.php which is inside the views folder will be called
// The 404.php has access to $_GET and $_POST
any('/404','views/404.php');


