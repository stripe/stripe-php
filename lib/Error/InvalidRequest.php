<?php

namespace Stripe\Error;

class InvalidRequest extends Base
{
    /**
     * @param string   $message
     * @param int|null $stripeParam
     * @param null     $httpStatus
     * @param null     $httpBody
     * @param null     $jsonBody
     * @param null     $httpHeaders
     */
    public function __construct(
        $message,
        $stripeParam,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null
    ) {
        parent::__construct($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders);
        $this->stripeParam = $stripeParam;
    }

    /**
     * @return int|null
     */
    public function getStripeParam()
    {
        return $this->stripeParam;
    }
}
