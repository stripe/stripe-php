<?php

namespace Stripe;

class Refund extends ApiResource
{
  /**
   * @return string The API URL for this Stripe refund.
   */
  public function instanceUrl()
  {
    $id = $this['id'];
    $charge = $this['charge'];
    if (!$id) {
      throw new InvalidRequestError(
          "Could not determine which URL to request: " .
          "class instance has invalid ID: $id",
          null
      );
    }
    $id = ApiRequestor::utf8($id);
    $charge = ApiRequestor::utf8($charge);

    $base = self::classUrl('Stripe\\Charge');
    $chargeExtn = urlencode($charge);
    $extn = urlencode($id);
    return "$base/$chargeExtn/refunds/$extn";
  }

  /**
   * @return Refund The saved refund.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }
}
