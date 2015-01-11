<?php
namespace Stripe;

abstract class Util
{
  /**
   * Whether the provided array (or other) is a list rather than a dictionary.
   *
   * @param array|mixed $array
   * @return boolean True if the given object is a list.
   */
  public static function isList($array)
  {
    if (!is_array($array))
      return false;

    // TODO: generally incorrect, but it's correct given Stripe's response
    foreach (array_keys($array) as $k) {
      if (!is_numeric($k))
        return false;
    }
    return true;
  }

  /**
   * Recursively converts the PHP Stripe object to an array.
   *
   * @param array $values The PHP Stripe object to convert.
   * @return array
   */
  public static function convertStripeObjectToArray($values)
  {
    $results = array();
    foreach ($values as $k => $v) {
      // FIXME: this is an encapsulation violation
      if ($k[0] == '_') {
        continue;
      }
      if ($v instanceof Object) {
        $results[$k] = $v->__toArray(true);
      } else if (is_array($v)) {
        $results[$k] = self::convertStripeObjectToArray($v);
      } else {
        $results[$k] = $v;
      }
    }
    return $results;
  }

  /**
   * Converts a response from the Stripe API to the corresponding PHP object.
   *
   * @param array $resp The response from the Stripe API.
   * @param string $apiKey
   * @return Object|array
   */
  public static function convertToStripeObject($resp, $apiKey)
  {
    $types = array(
      'card' => 'Stripe\\Card',
      'charge' => 'Stripe\\Charge',
      'coupon' => 'Stripe\\Coupon',
      'customer' => 'Stripe\\Customer',
      'list' => 'Stripe\\Collection',
      'invoice' => 'Stripe\\Invoice',
      'invoiceitem' => 'Stripe\\InvoiceItem',
      'event' => 'Stripe\\Event',
      'transfer' => 'Stripe\\Transfer',
      'plan' => 'Stripe\\Plan',
      'recipient' => 'Stripe\\Recipient',
      'refund' => 'Stripe\\Refund',
      'subscription' => 'Stripe\\Subscription',
      'fee_refund' => 'Stripe\\ApplicationFeeRefund'
    );
    if (self::isList($resp)) {
      $mapped = array();
      foreach ($resp as $i)
        array_push($mapped, self::convertToStripeObject($i, $apiKey));
      return $mapped;
    } else if (is_array($resp)) {
      if (isset($resp['object'])
          && is_string($resp['object'])
          && isset($types[$resp['object']])) {
        $class = $types[$resp['object']];
      } else {
        $class = 'Stripe\\Object';
      }
      return Object::scopedConstructFrom($class, $resp, $apiKey);
    } else {
      return $resp;
    }
  }
}
