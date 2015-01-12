<?php

namespace Stripe;

class Charge extends ApiResource
{
  /**
   * @param string $id The ID of the charge to retrieve.
   * @param string|null $apiKey
   *
   * @return Charge
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
   * @return array An array of Charges.
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
   * @return Charge The created charge.
   */
  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }

  /**
   * @return Charge The saved charge.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }

  /**
   * @param array|null $params
   *
   * @return Charge The refunded charge.
   */
  public function refund($params=null)
  {
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/refund';
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @param array|null $params
   *
   * @return Charge The captured charge.
   */
  public function capture($params=null)
  {
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/capture';
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @param array|null $params
   *
   * @return array The updated dispute.
   */
  public function updateDispute($params=null)
  {
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/dispute';
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom(array('dispute' => $response), $apiKey, true);
    return $this->dispute;
  }

  /**
   * @return Charge The updated charge.
   */
  public function closeDispute()
  {
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/dispute/close';
    list($response, $apiKey) = $requestor->request('post', $url);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @return Charge The updated charge.
   */
  public function markAsFraudulent()
  {
    $params = array('fraud_details' => array('user_report' => 'fraudulent'));
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @return Charge The updated charge.
   */
  public function markAsSafe()
  {
    $params = array('fraud_details' => array('user_report' => 'safe'));
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }
}
