# Stripe PHP bindings

[![Build Status](https://travis-ci.org/stripe/stripe-php.svg?branch=master)](https://travis-ci.org/stripe/stripe-php)
[![Latest Stable Version](https://poser.pugx.org/stripe/stripe-php/v/stable.svg)](https://packagist.org/packages/stripe/stripe-php)
[![Total Downloads](https://poser.pugx.org/stripe/stripe-php/downloads.svg)](https://packagist.org/packages/stripe/stripe-php)
[![License](https://poser.pugx.org/stripe/stripe-php/license.svg)](https://packagist.org/packages/stripe/stripe-php)
[![Code Coverage](https://coveralls.io/repos/stripe/stripe-php/badge.png?branch=master)](https://coveralls.io/r/stripe/stripe-php?branch=master)

You can sign up for a Stripe account at https://stripe.com.

## Requirements

PHP 5.3.3 and later.

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Add this to your `composer.json`:

    {
      "require": {
        "stripe/stripe-php": "2.*"
      }
    }

Then install via:

    composer.phar install

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/00-intro.md#autoloading):

    require_once('vendor/autoload.php');
    
## Manual Installation

If you do not wish to use Composer, you can download the [latest release](https://github.com/stripe/stripe-php/releases). Then, to use the bindings, include the `init.php` file.

    require_once('/path/to/stripe-php/init.php');

## Getting Started

Simple usage looks like:

    \Stripe\Stripe::setApiKey('d8e8fca2dc0f896fd7cb4cb0031ba249');
    $myCard = array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015);
    $charge = \Stripe\Charge::create(array('card' => $myCard, 'amount' => 2000, 'currency' => 'usd'));
    echo $charge;

## Documentation

Please see https://stripe.com/docs/api for up-to-date documentation.

## Legacy Version Support

If you are using PHP 5.2, you can download v1.18.0 ([zip](https://github.com/stripe/stripe-php/archive/v1.18.0.zip), [tar.gz](https://github.com/stripe/stripe-php/archive/v1.18.0.tar.gz)) from our [releases page](https://github.com/stripe/stripe-php/releases). This version will continue to work with new versions of the Stripe API for all common uses.

This legacy version may be included via `require_once("/path/to/stripe-php/lib/Stripe.php");`, and used like:

    Stripe::setApiKey('d8e8fca2dc0f896fd7cb4cb0031ba249');
    $myCard = array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015);
    $charge = Stripe_Charge::create(array('card' => $myCard, 'amount' => 2000, 'currency' => 'usd'));
    echo $charge;

## Tests

In order to run tests first install [PHPUnit](http://packagist.org/packages/phpunit/phpunit) via [Composer](http://getcomposer.org/):

    composer.phar update --dev

To run the test suite:

    ./vendor/bin/phpunit

