<?php

namespace Stripe\Error;

class Card extends Base
{
    public function __construct(
        $message,
        $stripeParam,
        $stripeCode,
        $httpStatus,
        $httpBody,
        $jsonBody,
        $httpHeaders = null
    ) {
        parent::__construct($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders);
        $this->stripeParam = $stripeParam;
        $this->stripeCode = $stripeCode;
        $this->stripeDeclineCode = isset($jsonBody["error"]["decline_code"]) ? $jsonBody["error"]["decline_code"] : null;
    }

    public function getStripeCode()
    {
        return $this->stripeCode;
    }

    public function getStripeParam()
    {
        return $this->stripeParam;
    }

    public function getStripeDeclineCode()
    {
        return $this->stripeDeclineCode;
    }
}
