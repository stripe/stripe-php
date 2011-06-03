<?php

class Stripe_Error_InvalidRequest extends Stripe_Error {
  public function __construct($message, $param) {
    parent::__construct($message);
    $this->param = $param;
  }
}
