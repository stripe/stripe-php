<?php

class Stripe_BitcoinReceiver extends Stripe_ApiResource
{
  /**
   * @param string $class Ignored.
   *
   * @return string The class URL for this resource. It needs to be special
   *    cased because it doesn't fit into the standard resource pattern.
   */
  public static function classUrl($class)
  {
    return "/v1/bitcoin/receivers";
  }

  /**
   * @param string $id The ID of the Bitcoin Receiver to retrieve.
   * @param string|null $apiKey
   *
   * @return Stripe_BitcoinReceiver
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
   * @return array An array of Stripe_BitcoinReceivers.
   */
  public static function all($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey);
  }

  /**
   * @param array|null $params
   * @param string|null $apiKey
   *
   * @return Stripe_BitcoinReceiver The created Bitcoin Receiver item.
   */
  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }

  /**
   * @return Stripe_BitcoinReceiver The saved Bitcoin Receiver item.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }
}

