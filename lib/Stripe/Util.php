<?php

abstract class Stripe_Util
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
      if ($k[0] == '_') {
        continue;
      }
      if ($v instanceof Stripe_Object) {
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
      'card' => 'Stripe_Card',
      'charge' => 'Stripe_Charge',
      'customer' => 'Stripe_Customer',
      'list' => 'Stripe_List',
      'invoice' => 'Stripe_Invoice',
      'invoiceitem' => 'Stripe_InvoiceItem',
      'event' => 'Stripe_Event',
      'transfer' => 'Stripe_Transfer',
      'plan' => 'Stripe_Plan',
      'recipient' => 'Stripe_Recipient',
      'subscription' => 'Stripe_Subscription'
    );
    if (self::isList($resp)) {
      $mapped = array();
      foreach ($resp as $i)
        array_push($mapped, self::convertToStripeObject($i, $apiKey));
      return $mapped;
    } else if (is_array($resp)) {
      if (isset($resp['object']) && is_string($resp['object']) && isset($types[$resp['object']]))
        $class = $types[$resp['object']];
      else
        $class = 'Stripe_Object';
      return Stripe_Object::scopedConstructFrom($class, $resp, $apiKey);
    } else {
      return $resp;
    }
  }
}
