<?php

namespace Stripe;

class CardError extends Error
{
  public function __construct($message, $param, $code, $httpStatus, 
      $httpBody, $jsonBody
  )
  {
    parent::__construct($message, $httpStatus, $httpBody, $jsonBody);
    $this->param = $param;
    $this->code = $code;
  }
}
