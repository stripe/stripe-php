<?php

namespace Stripe\Error;

class InvalidRequest extends Base
{
    public function __construct(
        $message,
        $param,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null
    ) {
        parent::__construct($message, $httpStatus, $httpBody, $jsonBody);
        $this->param = $param;
    }
}
