<?php

class Stripe_Object implements ArrayAccess {
  protected static $permanentAttributes;
  protected static $ignoredAttributes;

  public static function init() {
    self::$permanentAttributes = new Stripe_Util_Set(array('apiKey'));
    self::$ignoredAttributes = new Stripe_Util_Set(array('id', 'apiKey', 'object'));
  }

  protected $apiKey;
  protected $values;
  protected $unsavedValues;
  protected $transientValues;

  public function __construct($id=null, $apiKey=null) {
    $this->apiKey = $apiKey;
    $this->values = array();
    $this->unsavedValues = new Stripe_Util_Set();
    $this->transientValues = new Stripe_Util_Set();
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

  public static function scopedConstructFrom($class, $values, $apiKey=null) {
    $obj = new $class(isset($values['id']) ? $values['id'] : null,
		      $apiKey);
    $obj->refreshFrom($values, $apiKey);
    return $obj;
  }

  public static function constructFrom($values, $apiKey=null) {
    $class = get_class();
    return self::scopedConstructFrom($class, $values, $apiKey);
  }

  public function refreshFrom($values, $apiKey, $partial=false) {
    $this->apiKey = $apiKey;
    // Wipe old state before setting new.  This is useful for e.g. updating a
    // customer, where there is no persistent card parameter.  Mark those values
    // which don't persist as transient
    if ($partial)
      $removed = new Stripe_Util_Set();
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
      $this->values[$k] = Stripe_Util::convertToStripeObject($v, $apiKey);
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
    $values = Stripe_Util::arrayClone($this->values);
    ksort($values);
    foreach ($values as $k => $v) {
      if (self::$ignoredAttributes->includes($k))
	continue;
      $v = $this->$k;
      if ($v instanceof Stripe_Object)
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
Stripe_Object::init();
