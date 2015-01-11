<?php
namespace Stripe;

class Event extends ApiResource
{
  /**
   * @param string $id The ID of the event to retrieve.
   * @param string|null $apiKey
   *
   * @return Event
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
   * @return array An array of Events.
   */
  public static function all($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey);
  }
}
