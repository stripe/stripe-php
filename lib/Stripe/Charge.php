<?php

class Stripe_Charge extends Stripe_ApiResource
{
  /**
   * @param string $id The ID of the charge to retrieve.
   * @param string|null $apiKey
   *
   * @return Stripe_Charge
   */
  public static function retrieve($id, $options=null)
  {
    $class = get_class();
    return self::_scopedRetrieve($class, $id, $options);
  }

  /**
   * @param array|null $params
   * @param string|null $apiKey
   *
   * @return array An array of Stripe_Charges.
   */
  public static function all($params=null, $options=null)
  {
    $class = get_class();
    return self::_scopedAll($class, $params, $options);
  }

  /**
   * @param array|null $params
   * @param string|null $apiKey
   *
   * @return Stripe_Charge The created charge.
   */
  public static function create($params=null, $options=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $options);
  }

  /**
   * @return Stripe_Charge The saved charge.
   */
  public function save($options=null)
  {
    $class = get_class();
    return self::_scopedSave($class, $options);
  }

  /**
   * @param array|null $params
   *
   * @return Stripe_Charge The refunded charge.
   */
  public function refund($params=null, $options=null)
  {
    $opts = $this->parseOptions($options);
    $requestor = new Stripe_ApiRequestor($opts->apiKey);
    $url = $this->instanceUrl() . '/refund';
    list($response, $apiKey) = 
      $requestor->request('post', $url, $params, $opts->headers);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @param array|null $params
   *
   * @return Stripe_Charge The captured charge.
   */
  public function capture($params=null, $options=null)
  {
    $opts = $this->parseOptions($options);
    $requestor = new Stripe_ApiRequestor($opts->apiKey);
    $url = $this->instanceUrl() . '/capture';
    list($response, $apiKey) = 
      $requestor->request('post', $url, $params, $opts->headers);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @param array|null $params
   *
   * @return array The updated dispute.
   */
  public function updateDispute($params=null, $option=null)
  {
    $opts = $this->parseOptions($options);
    $requestor = new Stripe_ApiRequestor($opts->apiKey);
    $url = $this->instanceUrl() . '/dispute';
    list($response, $apiKey) = 
      $requestor->request('post', $url, $params, $headers);
    $this->refreshFrom(array('dispute' => $response), $apiKey, true);
    return $this->dispute;
  }

  /**
   * @return Stripe_Charge The updated charge.
   */
  public function closeDispute($options=null)
  {
    $opts = $this->parseOptions($options);
    $requestor = new Stripe_ApiRequestor($opts->apiKey);
    $url = $this->instanceUrl() . '/dispute/close';
    list($response, $apiKey) = 
      $requestor->request('post', $url, null, $opts->headers);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @return Stripe_Charge The updated charge.
   */
  public function markAsFraudulent()
  {
    $params = array('fraud_details' => array('user_report' => 'fraudulent'));
    $requestor = new Stripe_ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @return Stripe_Charge The updated charge.
   */
  public function markAsSafe()
  {
    $params = array('fraud_details' => array('user_report' => 'safe'));
    $requestor = new Stripe_ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }
}
