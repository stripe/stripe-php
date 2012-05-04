# About

This fork aims to be PHP 5.3 compatible and is not maintained by Stripe.

# Testing

[![Build Status](https://secure.travis-ci.org/easybib/stripe-php.png?branch=master)](http://travis-ci.org/easybib/stripe-php)

# Installation

Obtain the latest version of the Stripe PHP bindings with:

    git clone https://github.com/easybib/stripe-php

Or use [packagist.org](http://packagist.org/packages/easybib/stripe-php) and put the following into your project's `composer.json`:

    "require": {
      "easybib/stripe-php": "*"
    }

To get started, add the following to your PHP script:

    require_once("/path/to/stripe-php/lib/Stripe.php");

Simple usage looks like:


    require_once 'Stripe/Autoload.php';
    Autoload::register();
    
    Stripe\Base::setApiKey('d8e8fca2dc0f896fd7cb4cb0031ba249');
    $myCard = array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015);
    $charge = Stripe\Charge::create(array('card' => $myCard, 'amount' => 2000, 'currency' => 'usd'));
    echo $charge;

# Documentation

Please see https://stripe.com/api for up-to-date documentation.
