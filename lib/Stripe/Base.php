<?php
namespace Stripe;

abstract class Base
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
