<?php

class Stripe_Card extends Stripe_ApiResource
{
  public static function constructFrom($values, $apiKey=null)
  {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  /**
   * @return string The instance URL for this resource. It needs to be special
   *    cased because it doesn't fit into the standard resource pattern.
   */
  public function instanceUrl()
  {
    $id = $this['id'];
    if (!$id) {
      $msg = "Could not determine which URL to request: $class instance "
           . "has invalid ID: $id";
      throw new Stripe_InvalidRequestError($msg, null);
    }

    if (isset($this['customer'])) {

      $customer = $this['customer'];
      $class = get_class($this);

      $id = Stripe_ApiRequestor::utf8($id);
      $customer = Stripe_ApiRequestor::utf8($customer);

      $base = self::classUrl('Stripe_Customer');
      $customerExtn = urlencode($customer);
      $extn = urlencode($id);
      return "$base/$customerExtn/cards/$extn";
    } else {
      
      $recipient = $this['recipient'];
      $class = get_class($this);

      $id = Stripe_ApiRequestor::utf8($id);
      $recipient = Stripe_ApiRequestor::utf8($recipient);

      $base = self::classUrl('Stripe_Recipient');
      $recipientExtn = urlencode($recipient);
      $extn = urlencode($id);
      return "$base/$recipientExtn/cards/$extn";
    }
  }

  /**
   * @param array|null $params
   *
   * @return Stripe_Card The deleted card.
   */
  public function delete($params=null)
  {
    $class = get_class();
    return self::_scopedDelete($class, $params);
  }

  /**
   * @return Stripe_Card The saved card.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }
}

