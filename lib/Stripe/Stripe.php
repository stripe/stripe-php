<?php

abstract class Stripe
{
  public static $apiKey;
  public static $apiBase = 'https://api.stripe.com';
  public static $verifySslCerts = true;
  const VERSION = '1.7.9';

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
