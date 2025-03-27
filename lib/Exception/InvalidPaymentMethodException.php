<?php

// File generated from our OpenAPI spec

namespace Stripe\Exception;

class InvalidPaymentMethodException extends ApiErrorException
{
    protected $invalidParam;

    public static function factory(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null,
        $invalidParam = null
    ) {
        $instance = parent::factory($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode);
        $instance->setInvalidParam($invalidParam);

        return $instance;
    }

    public function getInvalidParam()
    {
        return $this->invalidParam;
    }

    public function setInvalidParam($invalidParam)
    {
        $this->invalidParam = $invalidParam;
    }
}
