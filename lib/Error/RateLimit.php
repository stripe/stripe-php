<?php

namespace Stripe\Error;

class RateLimit extends InvalidRequest
{
    public function __construct(
        $message,
        $param,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null
    ) {
        parent::__construct($message, $httpStatus, $httpBody, $jsonBody);
    }
}
