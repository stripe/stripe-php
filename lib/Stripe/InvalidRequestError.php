<?php

class Stripe_InvalidRequestError extends Stripe_Error
{
  public function __construct($message, $param)
  {
    parent::__construct($message);
    $this->param = $param;
  }
}
