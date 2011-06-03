<?php

class Stripe_InvoiceItem extends Stripe_ApiResource {
  public static function constructFrom($values, $apiKey=null) {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public static function retrieve($id, $apiKey=null) {
    $class = get_class();
    return self::scopedRetrieve($class, $id, $apiKey);
  }

  public static function all($params=null, $apiKey=null) {
    $class = get_class();
    return self::scopedAll($class, $params, $apiKey);
  }

  public static function create($params=null, $apiKey=null) {
    $class = get_class();
    return self::scopedCreate($class, $params, $apiKey);
  }

  public function save() {
    $class = get_class();
    return self::scopedSave($class);
  }

  public function delete() {
    $class = get_class();
    return self::scopedDelete($class);
  }
}

?>