<?php

class Stripe_Invoice extends Stripe_ApiResource
{
  public static function constructFrom($values, $apiKey=null)
  {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }

  public static function retrieve($id, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedRetrieve($class, $id, $apiKey);
  }

  public static function all($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey);
  }

  public static function upcoming($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey, '/upcoming');
  }

  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }

  public function pay($params=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $this->_apiKey, '/pay');
  }
}
