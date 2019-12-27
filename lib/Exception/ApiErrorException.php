<?php

namespace Stripe\Exception;

/**
 * Implements properties and methods common to all (non-SPL) Stripe exceptions.
 */
abstract class ApiErrorException extends \Exception implements ExceptionInterface
{
    protected $error;
    protected $httpBody;
    protected $httpHeaders;
    protected $httpStatus;
    protected $jsonBody;
    protected $requestId;
    protected $stripeCode;

    /**
     * Creates a new API error exception.
     *
     * @param string $message The exception message.
     * @param int|null $httpStatus The HTTP status code.
     * @param string|null $httpBody The HTTP body as a string.
     * @param array|null $jsonBody The JSON deserialized body.
     * @param array|\Stripe\Util\CaseInsensitiveArray|null $httpHeaders The HTTP headers array.
     * @param string|null $stripeCode The Stripe error code.
     *
     * @return static
     */
    public static function factory(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null
    ) {
        $instance = new static($message);
        $instance->setHttpStatus($httpStatus);
        $instance->setHttpBody($httpBody);
        $instance->setJsonBody($jsonBody);
        $instance->setHttpHeaders($httpHeaders);
        $instance->setStripeCode($stripeCode);

        $instance->setRequestId(null);
        if ($httpHeaders && isset($httpHeaders['Request-Id'])) {
            $instance->setRequestId($httpHeaders['Request-Id']);
        }

        $instance->setError($instance->constructErrorObject());

        return $instance;
    }

    /**
     * Gets the Stripe error object.
     *
     * @return \Stripe\ErrorObject|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Sets the Stripe error object.
     *
     * @param \Stripe\ErrorObject|null $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * Gets the HTTP body as a string.
     *
     * @return string|null
     */
    public function getHttpBody()
    {
        return $this->httpBody;
    }

    /**
     * Sets the HTTP body as a string.
     *
     * @param string|null $httpBody
     */
    public function setHttpBody($httpBody)
    {
        $this->httpBody = $httpBody;
    }

    /**
     * Gets the HTTP headers array.
     *
     * @return array|\Stripe\Util\CaseInsensitiveArray|null
     */
    public function getHttpHeaders()
    {
        return $this->httpHeaders;
    }

    /**
     * Sets the HTTP headers array.
     *
     * @param array|\Stripe\Util\CaseInsensitiveArray|null $httpHeaders
     */
    public function setHttpHeaders($httpHeaders)
    {
        $this->httpHeaders = $httpHeaders;
    }

    /**
     * Gets the HTTP status code.
     *
     * @return int|null
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /**
     * Sets the HTTP status code.
     *
     * @param int|null $httpStatus
     */
    public function setHttpStatus($httpStatus)
    {
        $this->httpStatus = $httpStatus;
    }

    /**
     * Gets the JSON deserialized body.
     *
     * @return array<string, mixed>|null
     */
    public function getJsonBody()
    {
        return $this->jsonBody;
    }

    /**
     * Sets the JSON deserialized body.
     *
     * @param array<string, mixed>|null $jsonBody
     */
    public function setJsonBody($jsonBody)
    {
        $this->jsonBody = $jsonBody;
    }

    /**
     * Gets the Stripe request ID.
     *
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * Sets the Stripe request ID.
     *
     * @param string|null $requestId
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;
    }

    /**
     * Gets the Stripe error code.
     *
     * Cf. the `CODE_*` constants on {@see \Stripe\ErrorObject} for possible
     * values.
     *
     * @return string|null
     */
    public function getStripeCode()
    {
        return $this->stripeCode;
    }

    /**
     * Sets the Stripe error code.
     *
     * @param string|null $stripeCode
     */
    public function setStripeCode($stripeCode)
    {
        $this->stripeCode = $stripeCode;
    }

    /**
     * Returns the string representation of the exception.
     *
     * @return string
     */
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
