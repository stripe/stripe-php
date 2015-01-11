<?php
namespace Stripe;

class Plan extends ApiResource
{
  /**
   * @param string $id The ID of the plan to retrieve.
   * @param string|null $apiKey
   *
   * @return Plan
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
   * @return Plan The created plan.
   */
  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }

  /**
   * @param array|null $params
   *
   * @return Plan The deleted plan.
   */
  public function delete($params=null)
  {
    $class = get_class();
    return self::_scopedDelete($class, $params);
  }
  
  /**
   * @return Plan The saved plan.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }
  
  /**
   * @param array|null $params
   * @param string|null $apiKey
   *
   * @return array An array of Plans.
   */
  public static function all($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $apiKey);
  }
}
