<?php

abstract class Stripe_Util
{
  public static function arrayClone($array)
  {
    if (!is_array($array))
      throw new StripeError("Trying to clone non-array: $array");
    return array_merge($array);
  }

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

  public static function convertToStripeObject($resp, $apiKey)
  {
    $types = array('charge' => 'Stripe_Charge',
		   'customer' => 'Stripe_Customer',
		   'invoice' => 'Stripe_Invoice',
		   'invoiceitem' => 'Stripe_InvoiceItem');
    if (self::isList($resp)) {
      $mapped = array();
      foreach ($resp as $i)
	array_push($mapped, self::convertToStripeObject($i, $apiKey));
      return $mapped;
    } else if (is_array($resp)) {
      $resp = self::arrayClone($resp);
      if (isset($resp['object']) && isset($types[$resp['object']]))
	$class = $types[$resp['object']];
      else
	$class = 'Stripe_Object';
      return Stripe_Object::scopedConstructFrom($class, $resp, $apiKey);
    } else {
      return $resp;
    }
  }
}
