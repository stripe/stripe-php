<?php

class Stripe_Error_Card extends Stripe_Error {
  public function __construct($message, $param, $code) {
    parent::__construct($message);
    $this->param = $param;
    $this->code = $code;
  }
}

?>