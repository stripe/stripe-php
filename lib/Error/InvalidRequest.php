<?php

namespace Stripe\Error;

/**
 * InvalidRequest is raised when a request is initiated with invalid parameters.
 *
 * @package Stripe\Error
 */
class InvalidRequest extends Base
{
    protected $stripeParam;

    public function __construct(
        $message,
        $stripeParam,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null
    ) {
        parent::__construct($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode);
        $this->stripeParam = $stripeParam;
    }

    public function getStripeParam()
    {
        return $this->stripeParam;
    }
}
