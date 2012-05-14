<?php

namespace Stripe;

// Tested on PHP 5.2, 5.3

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
	throw new Exception('Stripe needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
	throw new Exception('Stripe needs the JSON PHP extension.');
}


abstract class Stripe
{
	public static $apiKey;
	public static $apiBase = 'https://api.stripe.com/v1';
	public static $verifySslCerts = true;
	const VERSION = '1.6.5';

	public static function getApiKey()
	{
		return self::$apiKey;
	}

	public static function setApiKey($apiKey)
	{
		self::$apiKey = $apiKey;
	}

	public static function getVerifySslCerts() {
		return self::$verifySslCerts;
	}

	public static function setVerifySslCerts($verify) {
		self::$verifySslCerts = $verify;
	}
}