<?php
namespace Stripe;

abstract class ApiResource extends Object
{
  public static function baseUrl()
  {
    return Stripe::$apiBase;
  }

  protected static function _scopedRetrieve($class, $id, $apiKey=null)
  {
    $instance = new $class($id, $apiKey);
    $instance->refresh();
    return $instance;
  }

  /**
   * @returns ApiResource The refreshed resource.
   */
  public function refresh()
  {
    $requestor = new ApiRequestor($this->_apiKey, self::baseUrl());
    $url = $this->instanceUrl();

    list($response, $apiKey) = $requestor->request(
        'get',
        $url,
        $this->_retrieveOptions
    );
    $this->refreshFrom($response, $apiKey);
    return $this;
  }

  /**
   * @param string $class
   *
   * @returns string The name of the class, with namespacing and underscores
   *    stripped.
   */
  public static function className($class)
  {
    // Useful for namespaces: Foo\Charge
    if ($postfixNamespaces = strrchr($class, '\\')) {
      $class = substr($postfixNamespaces, 1);
    }
    // Useful for underscored 'namespaces': Foo_Charge
    if ($postfixFakeNamespaces = strrchr($class, '')) {
      $class = $postfixFakeNamespaces;
    }
    if (substr($class, 0, strlen('Stripe')) == 'Stripe') {
      $class = substr($class, strlen('Stripe'));
    }
    $class = str_replace('_', '', $class);
    $name = urlencode($class);
    $name = strtolower($name);
    return $name;
  }

  /**
   * @param string $class
   *
   * @returns string The endpoint URL for the given class.
   */
  public static function classUrl($class)
  {
    $base = self::_scopedLsb($class, 'className', $class);
    return "/v1/${base}s";
  }

  /**
   * @returns string The full API URL for this API resource.
   */
  public function instanceUrl()
  {
    $id = $this['id'];
    $class = get_class($this);
    if ($id === null) {
      $message = "Could not determine which URL to request: "
               . "$class instance has invalid ID: $id";
      throw new InvalidRequestError($message, null);
    }
    $id = ApiRequestor::utf8($id);
    $base = $this->_lsb('classUrl', $class);
    $extn = urlencode($id);
    return "$base/$extn";
  }

  private static function _validateCall($method, $params=null, $apiKey=null)
  {
    if ($params && !is_array($params)) {
      $message = "You must pass an array as the first argument to Stripe API "
               . "method calls.  (HINT: an example call to create a charge "
               . "would be: \"StripeCharge::create(array('amount' => 100, "
               . "'currency' => 'usd', 'card' => array('number' => "
               . "4242424242424242, 'exp_month' => 5, 'exp_year' => 2015)))\")";
      throw new Error($message);
    }

    if ($apiKey && !is_string($apiKey)) {
      $message = 'The second argument to Stripe API method calls is an '
               . 'optional per-request apiKey, which must be a string.  '
               . '(HINT: you can set a global apiKey by '
               . '"Stripe::setApiKey(<apiKey>)")';
      throw new Error($message);
    }
  }

  protected static function _scopedAll($class, $params=null, $apiKey=null)
  {
    self::_validateCall('all', $params, $apiKey);
    $base = self::_scopedLsb($class, 'baseUrl');
    $url = self::_scopedLsb($class, 'classUrl', $class);

    $requestor = new ApiRequestor($apiKey, $base);
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    return Util::convertToStripeObject($response, $apiKey);
  }

  protected static function _scopedCreate($class, $params=null, $apiKey=null)
  {
    self::_validateCall('create', $params, $apiKey);
    $base = self::_scopedLsb($class, 'baseUrl');
    $url = self::_scopedLsb($class, 'classUrl', $class);

    $requestor = new ApiRequestor($apiKey, $base);
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    return Util::convertToStripeObject($response, $apiKey);
  }

  protected function _scopedSave($class)
  {
    self::_validateCall('save');
    $requestor = new ApiRequestor($this->_apiKey, self::baseUrl());
    $params = $this->serializeParameters();

    if (count($params) > 0) {
      $url = $this->instanceUrl();
      list($response, $apiKey) = $requestor->request('post', $url, $params);
      $this->refreshFrom($response, $apiKey);
    }
    return $this;
  }

  protected function _scopedDelete($class, $params=null)
  {
    self::_validateCall('delete');
    $requestor = new ApiRequestor($this->_apiKey, self::baseUrl());
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('delete', $url, $params);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }
}
