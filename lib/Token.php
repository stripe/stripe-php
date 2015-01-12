<?php

namespace Stripe;

class Token extends ApiResource
{
  /**
   * @param string $id The ID of the token to retrieve.
   * @param string|null $apiKey
   *
   * @return Token
   */
  public static function retrieve($id, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedRetrieve($class, $id, $apiKey);
  }

  /**
   * @param array|null $params
   * @param string|null $apiKey
   *
   * @return Coupon The created token.
   */
  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }
}
