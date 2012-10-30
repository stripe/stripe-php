<?php

abstract class Stripe_SingletonApiResource extends Stripe_ApiResource
{
  protected static function _scopedSingletonRetrieve($class, $apiKey=null)
  {
    $instance = new $class(null, $apiKey);
    $instance->refresh();
    return $instance;
  }

  public static function classUrl($class)
  {
    $base = self::className($class);
    return "/v1/${base}";
  }

  public function instanceUrl()
  {
    $class = get_class($this);
    $base = self::classUrl($class);
    return "$base";
  }
}
