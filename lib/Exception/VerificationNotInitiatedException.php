<?php

// File generated from our OpenAPI spec

namespace Stripe\Exception;

class VerificationNotInitiatedException extends ApiErrorException
{
    protected $verificationStatus;

    public static function factory(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null,
        $verificationStatus = null
    ) {
        $instance = parent::factory($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode);
        $instance->setVerificationStatus($verificationStatus);

        return $instance;
    }

    public function getVerificationStatus()
    {
        return $this->verificationStatus;
    }

    public function setVerificationStatus($verificationStatus)
    {
        $this->verificationStatus = $verificationStatus;
    }
}
