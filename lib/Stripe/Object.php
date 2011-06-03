<?php

class Stripe_Object implements ArrayAccess
{
  protected static $_permanentAttributes;
  protected static $_ignoredAttributes;

  public static function init()
  {
    self::$_permanentAttributes = new Stripe_Util_Set(array('_apiKey'));
    self::$_ignoredAttributes = new Stripe_Util_Set(array('id', '_apiKey', 'object'));
  }

  protected $_apiKey;
  protected $_values;
  protected $_unsavedValues;
  protected $_transientValues;

  public function __construct($id=null, $apiKey=null)
  {
    $this->_apiKey = $apiKey;
    $this->_values = array();
    $this->_unsavedValues = new Stripe_Util_Set();
    $this->_transientValues = new Stripe_Util_Set();
    if ($id)
      $this->id = $id;
  }

  // Standard accessor magic methods
  public function __set($k, $v)
  {
    // TODO: may want to clear from $_transientValues.  (Won't be user-visible.)
    $this->_values[$k] = $v;
    if (!self::$_ignoredAttributes->includes($k))
      $this->_unsavedValues->add($k);
  }
  public function __isset($k)
  {
    return isset($this->_values[$k]);
  }
  public function __unset($k)
  {
    unset($this->_values[$k]);
    $this->_transientValues->add($k);
    $this->_unsavedValues->discard($k);
  }
  public function __get($k)
  {
    if (isset($this->_values[$k])) {
      return $this->_values[$k];
    } else if ($this->_transientValues->includes($k)) {
      $class = get_class($this);
      $attrs = join(', ', array_keys($this->_values));
      error_log("Stripe Notice: Undefined property of $class instance: $k.  HINT: The $k attribute was set in the past, however.  It was then wiped when refreshing the object with the result returned by Stripe's API, probably as a result of a save().  The attributes currently available on this object are: $attrs");
      return null;
    } else {
      $class = get_class($this);
      error_log("Stripe Notice: Undefined property of $class instance: $k");
      return null;
    }
  }

  // ArrayAccess methods
  public function offsetSet($k, $v)
  {
    $this->$k = $v;
  }
  public function offsetExists($k)
  {
    return isset($this->$k);
  }
  public function offsetUnset($k)
  {
    unset($this->$k);
  }
  public function offsetGet($k)
  {
    return isset($this->_values[$k]) ? $this->_values[$k] : null;
  }

  // This unfortunately needs to be public to be used in Util.php
  public static function scopedConstructFrom($class, $values, $apiKey=null)
  {
    $obj = new $class(isset($values['id']) ? $values['id'] : null,
		      $apiKey);
    $obj->refreshFrom($values, $apiKey);
    return $obj;
  }

  public static function constructFrom($values, $apiKey=null)
  {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public function refreshFrom($values, $apiKey, $partial=false)
  {
    $this->_apiKey = $apiKey;
    // Wipe old state before setting new.  This is useful for e.g. updating a
    // customer, where there is no persistent card parameter.  Mark those values
    // which don't persist as transient
    if ($partial)
      $removed = new Stripe_Util_Set();
    else
      $removed = array_diff(array_keys($this->_values), array_keys($values));

    foreach ($removed as $k) {
      if (self::$_permanentAttributes->includes($k))
        continue;
      unset($this->$k);
    }

    foreach ($values as $k => $v) {
      if (self::$_permanentAttributes->includes($k))
        continue;
      $this->_values[$k] = Stripe_Util::convertToStripeObject($v, $apiKey);
      $this->_transientValues->discard($k);
      $this->_unsavedValues->discard($k);
    }
  }

  protected function _ident()
  {
    return array($this['object'], $this['id']);
  }

  protected function _stringify($nested=false)
  {
    $ident = array_filter($this->_ident());
    if ($ident)
      $ident = '[' . join(', ', $ident) . ']';
    else
      $ident = '';
    $class = get_class($this);

    if ($nested)
      return "<$class$ident ...>";

    $valuesStr = array();
    $values = Stripe_Util::arrayClone($this->_values);
    ksort($values);
    foreach ($values as $k => $v) {
      if (self::$_ignoredAttributes->includes($k))
	continue;
      $v = $this->$k;
      if ($v instanceof Stripe_Object)
	$v = $v->_stringify(true);
      else if (is_bool($v))
	$v = $v ? 'true' : 'false';
      else
	$v = "$v";
      if ($this->_unsavedValues->includes($k))
	array_push($valuesStr, "$k=$v (unsaved)");
      else
	array_push($valuesStr, "$k=$v");
    }
    if (count($valuesStr) == 0)
      array_push($valuesStr, '(no attributes)');
    $displayValues = join(', ', $valuesStr);
    return "<$class$ident $displayValues>";
  }

  public function __toString()
  {
    return $this->_stringify();
  }
}


Stripe_Object::init();
