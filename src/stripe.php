<?php

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
  throw new Exception('Stripe needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Stripe needs the JSON PHP extension.');
}
require_once(dirname(__FILE__) . '/compat.php');

abstract class Stripe {
  public static $apiKey;
  public static $apiBase = 'https://api.stripe.com/v1';
  const VERSION = '1.5.0';
}

// Exceptions
class StripeError extends Exception { }
class StripeAPIError extends StripeError {}
class StripeAPIConnectionError extends StripeError {}
class StripeCardError extends StripeError {
  public function __construct($message, $param, $code) {
    parent::__construct($message);
    $this->param = $param;
    $this->code = $code;
  }
}
class StripeInvalidRequestError extends StripeError {
  public function __construct($message, $param) {
    parent::__construct($message);
    $this->param = $param;
  }
}
class StripeAuthenticationError extends StripeError {}

// Utility classes
class StripeSet {
  private $elts;

  public function __construct($members=array()) {
    $this->elts = array();
    foreach ($members as $item)
      $this->elts[$item] = true;
  }

  public function includes($elt) {
    return isset($this->elts[$elt]);
  }

  public function add($elt) {
    $this->elts[$elt] = true;
  }

  public function discard($elt) {
    unset($this->elts[$elt]);
  }

  // TODO: make Set support foreach
  public function toArray() {
    return array_keys($this->elts);
  }
}

abstract class StripeUtil {
  public static function arrayClone($array) {
    if (!is_array($array))
      throw new StripeError("Trying to clone non-array: $array");
    return array_merge($array);
  }

  public static function isList($array) {
    if (!is_array($array))
      return false;
    // TODO: this isn't actually correct in general, but it's correct given Stripe's responses
    foreach (array_keys($array) as $k) {
      if (!is_numeric($k))
	return false;
    }
    return true;
  }

  public static function convertToStripeObject($resp, $apiKey) {
    $types = array('charge' => 'StripeCharge',
		   'customer' => 'StripeCustomer',
		   'invoice' => 'StripeInvoice',
		   'invoiceitem' => 'StripeInvoiceItem');
    if (self::isList($resp)) {
      $mapped = array();
      foreach ($resp as $i)
	array_push($mapped, self::convertToStripeObject($i, $apiKey));
      return $mapped;
    } else if (is_array($resp)) {
      $resp = self::arrayClone($resp);
      if (isset($resp['object']) && isset($types[$resp['object']]))
	$className = $types[$resp['object']];
      else
	$className = 'StripeObject';
      return call_user_func("$className::constructFrom", $resp, $apiKey, $className);
    } else {
      return $resp;
    }
  }
}

// Network transport
class StripeAPIRequestor {
  public $apiKey;

  public function __construct($apiKey=null) {
    $this->apiKey = $apiKey;
  }

  public static function apiUrl($url='') {
    $apiBase = Stripe::$apiBase;
    return "$apiBase$url";
  }

  public static function utf8($value) {
    if (is_string($value))
      return utf8_encode($value);
    else
      return $value;
  }

  private static function objectsToIds($d) {
    if ($d instanceof StripeAPIRequestor) {
      return $d->id;
    } else if (is_array($d)) {
      $res = array();
      foreach ($res as $k => $v)
	$res[$k] = self::objectsToIds($v);
      return $res;
    } else {
      return $d;
    }
  }

  public static function encode($d) {
    return http_build_query($d, null, '&');
  }

  public function request($meth, $url, $params=null) {
    if (!$params)
      $params = array();
    list($rbody, $rcode, $myApiKey) = $this->requestRaw($meth, $url, $params);
    $resp = $this->interpretResponse($rbody, $rcode);
    return array($resp, $myApiKey);
  }

  public function handleApiError($rbody, $rcode, $resp) {
    if (!is_array($resp) || !isset($resp['error']))
      throw new StripeAPIError("Invalid response object from API: $rbody (HTTP response code was $rcode)");
    $error = $resp['error'];
    switch ($rcode) {
    case 400:
    case 404:
      throw new StripeInvalidRequestError(isset($error['message']) ? $error['message'] : null,
					  isset($error['param']) ? $error['param'] : null);
    case 401:
      throw new StripeAuthenticationError(isset($error['message']) ? $error['message'] : null);
    case 402:
      throw new StripeCardError(isset($error['message']) ? $error['message'] : null,
				isset($error['param']) ? $error['param'] : null,
				isset($error['code']) ? $error['code'] : null);
    default:
      throw new StripeAPIError(isset($error['message']) ? $error['message'] : null);
    }
  }

  private function requestRaw($meth, $url, $params) {
    $myApiKey = $this->apiKey;
    if (!$myApiKey)
      $myApiKey = Stripe::$apiKey;
    if (!$myApiKey)
      throw new StripeAuthenticationError('No API key provided.  (HINT: set your API key using "Stripe::$apiKey = <API-KEY>".  You can generate API keys from the Stripe web interface.  See https://stripe.com/api for details, or email support@stripe.com if you have any questions.');

    $absUrl = $this->apiUrl($url);
    $params = StripeUtil::arrayClone($params);
    $this->objectsToIds($params);
    $langVersion = phpversion();
    $uname = php_uname();
    $ua = array('bindings_version' => Stripe::VERSION,
		'lang' => 'php',
		'lang_version' => $langVersion,
		'publisher' => 'stripe',
		'uname' => $uname);
    $headers = array('X-Stripe-Client-User-Agent: ' . json_encode($ua),
		     'User-Agent: Stripe/v1 RubyBindings/' . Stripe::VERSION);
    list($rbody, $rcode) = $this->curlRequest($meth, $absUrl, $headers, $params, $myApiKey);
    return array($rbody, $rcode, $myApiKey);
  }

  private function interpretResponse($rbody, $rcode) {
    try {
      $resp = json_decode($rbody, true);
    } catch (Exception $e) {
      throw new StripeAPIError("Invalid response body from API: $rbody (HTTP response code was $rcode)");
    }

    if ($rcode < 200 || $rcode >= 300) {
      $this->handleApiError($rbody, $rcode, $resp);
    }
    return $resp;
  }

  private function curlRequest($meth, $absUrl, $headers, $params, $myApiKey) {
    $curl = curl_init();
    $meth = strtolower($meth);
    $opts = array();
    if ($meth == 'get') {
      $opts[CURLOPT_HTTPGET] = 1;
      if (count($params) > 0) {
	$encoded = self::encode($params);
	$absUrl = "$absUrl?$encoded";
      }
    } else if ($meth == 'post') {
      $opts[CURLOPT_POST] = 1;
      $opts[CURLOPT_POSTFIELDS] = self::encode($params);
    } else if ($meth == 'delete')  {
      $opts[CURLOPT_CUSTOMREQUEST] = 'DELETE';
    } else {
      throw new StripeAPIError("Unrecognized method $meth");
    }

    $absUrl = self::utf8($absUrl);
    $opts[CURLOPT_URL] = $absUrl;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_CONNECTTIMEOUT] = 30;
    $opts[CURLOPT_TIMEOUT] = 80;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    $opts[CURLOPT_HTTPHEADER] = $headers;
    $opts[CURLOPT_USERPWD] = $myApiKey . ':';

    curl_setopt_array($curl, $opts);
    $rbody = curl_exec($curl);

    if (curl_errno($curl) == 60) { // CURLE_SSL_CACERT
      curl_setopt($curl, CURLOPT_CAINFO,
                  dirname(__FILE__) . '/data/ca-certificates.crt');
      $rbody = curl_exec($curl);
    }

    if ($rbody === false) {
      $errno = curl_errno($curl);
      $message = curl_error($curl);
      curl_close($curl);
      $this->handleCurlError($errno, $message);
    }

    $rcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return array($rbody, $rcode);
  }

  public function handleCurlError($errno, $message) {
    $apiBase = Stripe::$apiBase;
    switch ($errno) {
    case CURLE_COULDNT_CONNECT:
    case CURLE_COULDNT_RESOLVE_HOST:
    case CURLE_OPERATION_TIMEOUTED:
      $msg = "Could not connect to Stripe ($apiBase).  Please check your internet connection and try again.  If this problem persists, you should check Stripe's service status at https://twitter.com/stripe, or let us know at support@stripe.com.";
    case CURLE_SSL_CACERT:
      $msg = "Could not verify Stripe's SSL certificate.  Please make sure that your network is not intercepting certificates.  (Try going to $apiBase in your browser.)  If this problem persists, let us know at support@stripe.com.";
    default:
      $msg = "Unexpected error communicating with Stripe.  If this problem persists, let us know at support@stripe.com.";
    }

    $msg .= "\n\n(Network error: $message)";
    throw new StripeAPIConnectionError($msg);
  }
}

class StripeObject implements ArrayAccess {
  protected static $permanentAttributes;
  protected static $ignoredAttributes;

  public static function init() {
    self::$permanentAttributes = new StripeSet(array('apiKey'));
    self::$ignoredAttributes = new StripeSet(array('id', 'apiKey', 'object'));
  }

  protected $apiKey;
  protected $values;
  protected $unsavedValues;
  protected $transientValues;

  public function __construct($id=null, $apiKey=null) {
    $this->apiKey = $apiKey;
    $this->values = array();
    $this->unsavedValues = new StripeSet();
    $this->transientValues = new StripeSet();
    if ($id)
      $this->id = $id;
  }

  public function __set($k, $v) {
    // TODO: may want to clear from $transientValues.  (Won't be user-visible.)
    $this->values[$k] = $v;
    if (!self::$ignoredAttributes->includes($k))
      $this->unsavedValues->add($k);
  }
  public function __isset($k) {
    return isset($this->values[$k]);
  }
  public function __unset($k) {
    unset($this->values[$k]);
    $this->transientValues->add($k);
    $this->unsavedValues->discard($k);
  }
  public function __get($k) {
    if (isset($this->values[$k])) {
      return $this->values[$k];
    } else if ($this->transientValues->includes($k)) {
      $class = get_class($this);
      $attrs = join(', ', array_keys($this->values));
      error_log("Stripe Notice: Undefined property of $class instance: $k.  HINT: The $k attribute was set in the past, however.  It was then wiped when refreshing the object with the result returned by Stripe's API, probably as a result of a save().  The attributes currently available on this object are: $attrs");
      return null;
    } else {
      $class = get_class($this);
      error_log("Stripe Notice: Undefined property of $class instance: $k");
      return null;
    }
  }

  // ArrayAccess methods
  public function offsetSet($k, $v) {
    $this->$k = $v;
  }
  public function offsetExists($k) {
    return isset($this->$k);
  }
  public function offsetUnset($k) {
    unset($this->$k);
  }
  public function offsetGet($k) {
    return isset($this->values[$k]) ? $this->values[$k] : null;
  }

  public static function constructFrom($values, $apiKey=null, $class=null) {
    if (!$class)
      $class = get_called_class();
    $obj = new $class(isset($values['id']) ? $values['id'] : null,
		      $apiKey);
    $obj->refreshFrom($values, $apiKey);
    return $obj;
  }

  public function refreshFrom($values, $apiKey, $partial=false) {
    $this->apiKey = $apiKey;
    // Wipe old state before setting new.  This is useful for e.g. updating a
    // customer, where there is no persistent card parameter.  Mark those values
    // which don't persist as transient
    if ($partial)
      $removed = new StripeSet();
    else
      $removed = array_diff(array_keys($this->values), array_keys($values));

    foreach ($removed as $k) {
      if (self::$permanentAttributes->includes($k))
        continue;
      unset($this->$k);
    }

    foreach ($values as $k => $v) {
      if (self::$permanentAttributes->includes($k))
        continue;
      $this->values[$k] = StripeUtil::convertToStripeObject($v, $apiKey);
      $this->transientValues->discard($k);
      $this->unsavedValues->discard($k);
    }
  }

  protected function ident() {
    return array($this['object'], $this['id']);
  }

  protected function stringify($nested=false) {
    $ident = array_filter($this->ident());
    if ($ident)
      $ident = '[' . join(', ', $ident) . ']';
    else
      $ident = '';
    $class = get_class($this);

    if ($nested)
      return "<$class$ident ...>";

    $valuesStr = array();
    $values = StripeUtil::arrayClone($this->values);
    ksort($values);
    foreach ($values as $k => $v) {
      if (self::$ignoredAttributes->includes($k))
	continue;
      $v = $this->$k;
      if ($v instanceof StripeObject)
	$v = $v->stringify(true);
      else if (is_bool($v))
	$v = $v ? 'true' : 'false';
      else
	$v = "$v";
      if ($this->unsavedValues->includes($k))
	array_push($valuesStr, "$k=$v (unsaved)");
      else
	array_push($valuesStr, "$k=$v");
    }
    if (count($valuesStr) == 0)
      array_push($valuesStr, '(no attributes)');
    $displayValues = join(', ', $valuesStr);
    return "<$class$ident $displayValues>";
  }

  public function __toString() {
    return $this->stringify();
  }
}
StripeObject::init();

abstract class StripeAPIResource extends StripeObject {
  protected static $apiMethods;

  protected function ident() {
    return array($this['id']);
  }

  public static function retrieve($id, $apiKey=null) {
    $instance = new self($id, $apiKey);
    $instance->refresh();
    return $instance;
  }

  public function refresh() {
    $requestor = new StripeAPIRequestor($this->apiKey);
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('get', $url);
    $this->refreshFrom($response, $apiKey);
    return $this;
   }

  public static function classUrl() {
    $class = get_called_class();
    if (substr($class, 0, strlen('Stripe')) == 'Stripe')
      $class = substr($class, strlen('Stripe'));
    $name = urlencode($class);
    $name = strtolower($name);
    return "/${name}s";
  }

  public function instanceUrl() {
    $id = $this['id'];
    if (!$id) {
      $class = get_class($this);
      throw new StripeInvalidRequestError("Could not determine which URL to request: $class instance has invalid ID: $id");
    }
    $id = StripeAPIRequestor::utf8($id);
    $base = self::classUrl();
    $extn = urlencode($id);
    return "$base/$extn";
  }

  private static function validateCall($method, $params=null, $apiKey=null) {
    // PHP doesn't support mixins / multiple inheritance, so need
    // to accpt this hack if we want to stay DRY
    $class = get_called_class();
    $classVars = get_class_vars($class);
    $apiMethods = $classVars['apiMethods'];
    if (!$apiMethods->includes($method)) {
      $methods = join(', ', $apiMethods->toArray());
      throw new StripeError("Sorry, $class does not support the '$method' API method.  (HINT: $class supports the following methods: $methods)");
    }
    // We could add types to the API methods, but then we wouldn't get this friendly error message.
    if ($params && !is_array($params))
      throw new StripeError("You must pass an array as the first argument to Stripe API method calls.  (HINT: an example call to create a charge would be: \"StripeCharge::create(array('amount' => 100, 'currency' => 'usd', 'card' => array('number' => 4242424242424242, 'exp_month' => 5, 'exp_year' => 2015)))\")");
    if ($apiKey && !is_string($apiKey))
      throw new StripeError('The second argument to Stripe API method calls is an optional per-request apiKey, which must be a string.  (HINT: you can set a global apiKey by "Stripe::$apiKey = <apiKey>")');
  }

  public static function all($params=null, $apiKey=null) {
    self::validateCall('all', $params, $apiKey);
    $requestor = new StripeAPIRequestor($apiKey);
    $url = self::classUrl();
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    return StripeUtil::convertToStripeObject($response, $apiKey);
  }

  public static function create($params=null, $apiKey=null) {
    self::validateCall('create', $params, $apiKey);
    $requestor = new StripeAPIRequestor($apiKey);
    $url = self::classUrl();
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    return StripeUtil::convertToStripeObject($response, $apiKey);
  }

  public function save() {
    self::validateCall('save');
    if ($this->unsavedValues) {
      $requestor = new StripeAPIRequestor($this->apiKey);
      $params = array();
      foreach ($this->unsavedValues->toArray() as $k)
	$params[$k] = $this->$k;
      $url = $this->instanceUrl();
      list($response, $apiKey) = $requestor->request('post', $url, $params);
      $this->refreshFrom($response, $apiKey);
    }
    return $this;
  }

  public function delete() {
    self::validateCall('delete');
    $requestor = new StripeAPIRequestor($this->apiKey);
    $url = $this->instanceUrl();
    list($response, $apiKey) = $requestor->request('delete', $url);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }
}

// API objects.
class StripeCharge extends StripeAPIResource {
  protected static $apiMethods;

  public static function init() {
    self::$apiMethods = new StripeSet(array('create', 'all'));
  }

  public function refund() {
    $requestor = new StripeAPIRequestor($this->apiKey);
    $url = $this->instanceUrl() . '/refund';
    list($response, $apiKey) = $requestor->request('post', $url);
    $this->refreshFrom($response, $apiKey);
    return $this;
  }
}
StripeCharge::init();

class StripeCustomer extends StripeAPIResource {
  protected static $apiMethods;

  public static function init() {
    self::$apiMethods = new StripeSet(array('create', 'save', 'all', 'delete'));
  }

  public function addInvoiceItem($params=null) {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $ii = StripeInvoiceItem::create($params, $this->apiKey);
    return $ii;
  }

  public function invoices($params=null) {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $invoices = StripeInvoice::all($params, $this->apiKey);
    return $invoices;
  }

  public function invoiceItems($params=null) {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $iis = StripeInvoiceItem::all($params, $this->apiKey);
    return $iis;
  }

  public function charges($params=null) {
    if (!$params)
      $params = array();
    $params['customer'] = $this->id;
    $charges = StripeCharge::all($params, $this->apiKey);
    return $charges;
  }

  public function updateSubscription($params=null) {
    $requestor = new StripeAPIRequestor($this->apiKey);
    $url = $this->instanceUrl() . '/subscription';
    list($response, $apiKey) = $requestor->request('post', $url, $params);
    $this->refreshFrom(array('subscription' => $response), $apiKey, true);
    return $this->subscription;
  }

  public function cancelSubscription() {
    $requestor = StripeAPIRequestor($this->apiKey);
    $url = $this->instanceUrl() . '/subscription';
    list($response, $apiKey) = $requestor->request('delete', $url);
    $this->refreshFrom(array('subscription' => $response), $apiKey, true);
    return $this->subscription;
  }
}
StripeCustomer::init();

class StripeInvoice extends StripeAPIResource {
  protected static $apiMethods;

  public static function init() {
    self::$apiMethods = new StripeSet(array('all'));
  }

  public static function upcoming($params=null, $apiKey=null) {
    $requestor = new StripeAPIRequestor($this->apiKey);
    $url = $this->classUrl() . '/upcoming';
    list($response, $apiKey) = $requestor->request('get', $url, $params);
    return $this->convertToStripeObject($response, $apiKey);
  }
}
StripeInvoice::init();

class StripeInvoiceItem extends StripeAPIResource {
  protected static $apiMethods;

  public static function init() {
    self::$apiMethods = new StripeSet(array('create', 'save', 'all', 'delete'));
  }
}
StripeInvoiceItem::init();
