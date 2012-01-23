<?php

class Stripe_InvalidRequestError extends Stripe_Error
{
  public function __construct($message, $param, $code, $type=null)
  {
    parent::__construct($message);
    $this->param = $param;
    $this->code = $code;
		$this->type = $type;
  }
}
