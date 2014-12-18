<?php

class Stripe_RequestOptions
{
  public $headers;
  public $apiKey;
 
  public function __construct($key, $headers)
  {
    $this->apiKey = $key;
    $this->headers = $headers;
  }

  /**
   * Unpacks an options array into an Options object
   * @param array|string $options a key => value array
   * @return Options
   */
  public static function parse($options)
  {
    if (is_null($options)) {
      return new Stripe_RequestOptions(null, array());
    }

    if (is_string($options)) {
      return new Stripe_RequestOptions($options, array());
    }

    if (is_array($options)) {
      $headers = array();
      $key = null;
      if (array_key_exists('api_key', $options)) {
        $key = $options['api_key'];
      }
      if (array_key_exists('idempotency_key', $options)) {
        $headers['Idempotency-Key'] = $options['idempotency_key'];
      }
      return new Stripe_RequestOptions($key, $headers);
    }

    throw new Stripe_Error("options must be a string, an array, or null");
  }
}
