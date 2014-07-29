<?php

class Stripe_ApplicationFeeRefund extends Stripe_ApiResource
{
  /**
   * @return string The API URL for this Stripe refund.
   */
  public function instanceUrl()
  {
    $id = $this['id'];
    $fee = $this['fee'];
    if (!$id) {
      throw new Stripe_InvalidRequestError(
          "Could not determine which URL to request: " .
          "class instance has invalid ID: $id",
          null
      );
    }
    $id = Stripe_ApiRequestor::utf8($id);
    $fee = Stripe_ApiRequestor::utf8($fee);

    $base = self::classUrl('Stripe_ApplicationFee');
    $feeExtn = urlencode($fee);
    $extn = urlencode($id);
    return "$base/$feeExtn/refunds/$extn";
  }

  /**
   * @return Stripe_ApplicationFeeRefund The saved refund.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }
}
