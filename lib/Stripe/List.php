<?php

class Stripe_List extends Stripe_Object
{
  public static function constructFrom($values, $apiKey=null)
  {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public function all($params=null)
  {
    $requestor = new Stripe_ApiRequestor($this->_apiKey);
    list($response, $apiKey) = $requestor->request('get', $this['url'], $params);
    return Stripe_Util::convertToStripeObject($response, $apiKey);
  }
}
