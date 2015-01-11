<?php
namespace Stripe;

class Recipient extends ApiResource
{
  /**
   * @param string $id The ID of the recipient to retrieve.
   * @param string|null $apiKey
   *
   * @return Recipient
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
   * @return array An array of Recipients.
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
   * @return Recipient The created recipient.
   */
  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }

  /**
   * @return Recipient The saved recipient.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }

  /**
   * @param array|null $params
   *
   * @return Recipient The deleted recipient.
   */
  public function delete($params=null)
  {
    $class = get_class();
    return self::_scopedDelete($class, $params);
  }

  
  /**
   * @param array|null $params
   *
   * @return array An array of the recipient's Transfers.
   */
  public function transfers($params=null)
  {
    if (!$params)
      $params = array();
    $params['recipient'] = $this->id;
    $transfers = Transfer::all($params, $this->_apiKey);
    return $transfers;
  }
}
