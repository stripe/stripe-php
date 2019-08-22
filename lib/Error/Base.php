<?php

namespace Stripe\Error;

use Exception;

/**
 * Base is the base error from which all other more specific Stripe errors derive.
 *
 * @package Stripe\Error
 */
abstract class Base extends Exception
{
    protected $error;
    protected $httpBody;
    protected $httpHeaders;
    protected $httpStatus;
    protected $jsonBody;
    protected $requestId;
    protected $stripeCode;

    public function __construct(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null
    ) {
        parent::__construct($message);
        $this->httpStatus = $httpStatus;
        $this->httpBody = $httpBody;
        $this->jsonBody = $jsonBody;
        $this->httpHeaders = $httpHeaders;
        $this->stripeCode = $stripeCode;

        $this->requestId = null;
        if ($httpHeaders && isset($httpHeaders['Request-Id'])) {
            $this->requestId = $httpHeaders['Request-Id'];
        }

        $this->error = $this->constructErrorObject();
    }

    public function getError()
    {
        return $this->error;
    }

    public function getHttpBody()
    {
        return $this->httpBody;
    }

    public function getHttpHeaders()
    {
        return $this->httpHeaders;
    }

    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    public function getJsonBody()
    {
        return $this->jsonBody;
    }

    public function getRequestId()
    {
        return $this->requestId;
    }

    public function getStripeCode()
    {
        return $this->stripeCode;
    }

    public function __toString()
    {
        $statusStr = ($this->getHttpStatus() == null) ? "" : "(Status {$this->getHttpStatus()}) ";
        $idStr = ($this->getRequestId() == null) ? "" : "(Request {$this->getRequestId()}) ";
        return "{$statusStr}{$idStr}{$this->getMessage()}";
    }

    protected function constructErrorObject()
    {
        if (is_null($this->jsonBody) || !array_key_exists('error', $this->jsonBody)) {
            return null;
        }

        return \Stripe\ErrorObject::constructFrom($this->jsonBody['error']);
    }
}
