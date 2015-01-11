<?php
namespace Stripe;

class Customer extends ApiResource
{
  /**
   * @param string $id The ID of the customer to retrieve.
   * @param string|null $apiKey
   *
   * @return Customer
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
   * @return array An array of Customers.
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
   * @return Customer The created customer.
   */
  public static function create($params=null, $apiKey=null)
  {
    $class = get_class();
    return self::_scopedCreate($class, $params, $apiKey);
  }

  /**
   * @returns Customer The saved customer.
   */
  public function save()
  {
    $class = get_class();
    return self::_scopedSave($class);
  }

  /**
   * @param array|null $params
   *
   * @returns Customer The deleted customer.
   */
  public function delete($params=null)
  {
    $class = get_class();
    return self::_scopedDelete($class, $params);
  }

  /**
   * @param array|null $params
   *
   * @returns InvoiceItem The resulting invoice item.
   */
  public function addInvoiceItem($params=null)
  {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $ii = InvoiceItem::create($params, $this->_apiKey);
    return $ii;
  }

  /**
   * @param array|null $params
   *
   * @returns array An array of the customer's Invoices.
   */
  public function invoices($params=null)
  {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $invoices = Invoice::all($params, $this->_apiKey);
    return $invoices;
  }

  /**
   * @param array|null $params
   *
   * @returns array An array of the customer's InvoiceItems.
   */
  public function invoiceItems($params=null)
  {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $iis = InvoiceItem::all($params, $this->_apiKey);
    return $iis;
  }

  /**
   * @param array|null $params
   *
   * @returns array An array of the customer's Charges.
   */
  public function charges($params=null)
  {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $charges = Charge::all($params, $this->_apiKey);
    return $charges;
  }

  /**
   * @param array|null $params
   *
   * @returns Subscription The updated subscription.
   */
  public function updateSubscription($params=null)
  {
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/subscription';
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom(array('subscription' => $response), $apiKey, true);
    return $this->subscription;
  }

  /**
   * @param array|null $params
   *
   * @returns Subscription The cancelled subscription.
   */
  public function cancelSubscription($params=null)
  {
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/subscription';
    list($response, $apiKey) = $requestor->request('delete', $url, $params);
    $this->refreshFrom(array('subscription' => $response), $apiKey, true);
    return $this->subscription;
  }

  /**
   * @param array|null $params
   *
   * @returns Customer The updated customer.
   */
  public function deleteDiscount()
  {
    $requestor = new ApiRequestor($this->_apiKey);
    $url = $this->instanceUrl() . '/discount';
    list($response, $apiKey) = $requestor->request('delete', $url);
    $this->refreshFrom(array('discount' => null), $apiKey, true);
  }
}
