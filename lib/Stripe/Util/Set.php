<?php

class Stripe_Util_Set {
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

?>