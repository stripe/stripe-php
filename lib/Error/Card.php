<?php

namespace Stripe\Error;

class Card extends Base
{
    /**
     * @param string      $message
     * @param int|null    $stripeParam
     * @param null|string $stripeCode
     * @param null|string $httpStatus
     * @param array|null  $httpBody
     * @param string      $jsonBody
     * @param null        $httpHeaders
     */
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
    }

    /**
     * @return null|string
     */
    public function getStripeCode()
    {
        return $this->stripeCode;
    }

    /**
     * @return int|null
     */
    public function getStripeParam()
    {
        return $this->stripeParam;
    }
}
