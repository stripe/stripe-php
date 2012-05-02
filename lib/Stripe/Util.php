<?php
namespace Stripe;

use Stripe\Object;

abstract class Util
{
  public static function isList($array)
  {
    if (!is_array($array))
      return false;
    // TODO: this isn't actually correct in general, but it's correct given Stripe's responses
    foreach (array_keys($array) as $k) {
      if (!is_numeric($k))
        return false;
    }
    return true;
  }

  public static function convertStripeObjectToArray($values)
  {
    $results = array();
    foreach ($values as $k => $v) {
      // FIXME: this is an encapsulation violation
      if (Object::$_permanentAttributes->includes($k)) {
        continue;
      }
      if ($v instanceof Object) {
        $results[$k] = $v->__toArray(true);
      }
      else if (is_array($v)) {
        $results[$k] = self::convertStripeObjectToArray($v);
      }
      else {
        $results[$k] = $v;
      }
    }
    return $results;
  }

  public static function convertToStripeObject($resp, $apiKey)
  {
    $types = array(
      'charge'      => 'Stripe\Charge',
      'customer'    => 'Stripe\Customer',
      'invoice'     => 'Stripe\Invoice',
      'invoiceitem' => 'Stripe\InvoiceItem',
      'event'       => 'Stripe\Event'
    );
    if (self::isList($resp)) {
      $mapped = array();
      foreach ($resp as $i) {
        array_push($mapped, self::convertToStripeObject($i, $apiKey));
      }
      return $mapped;
    }
    if (is_array($resp)) {
      if (isset($resp['object']) && is_string($resp['object']) && isset($types[$resp['object']])) {
        $class = $types[$resp['object']];
      } else {
        $class = 'Stripe\Object';
      }
      return Object::scopedConstructFrom($class, $resp, $apiKey);
    }
    return $resp;
  }
}
