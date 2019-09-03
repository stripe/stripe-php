<?php

namespace Stripe\Exception;

/**
 * InvalidRequestException is thrown when a request is initiated with invalid
 * parameters.
 *
 * @package Stripe\Exception
 */
class InvalidRequestException extends ApiErrorException
{
    protected $stripeParam;

    /**
     * Creates a new InvalidRequestException exception.
     *
     * @param string $message The exception message.
     * @param int|null $httpStatus The HTTP status code.
     * @param string|null $httpBody The HTTP body as a string.
     * @param array|null $jsonBody The JSON deserialized body.
     * @param array|\Stripe\Util\CaseInsensitiveArray|null $httpHeaders The HTTP headers array.
     * @param string|null $stripeCode The Stripe error code.
     * @param string|null $stripeParam The parameter related to the error.
     *
     * @return InvalidRequestException
     */
    public static function factory(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null,
        $stripeParam = null
    ) {
        $instance = parent::factory($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode);
        $instance->setStripeParam($stripeParam);

        return $instance;
    }

    /**
     * Gets the parameter related to the error.
     *
     * @return string|null
     */
    public function getStripeParam()
    {
        return $this->stripeParam;
    }

    /**
     * Sets the parameter related to the error.
     *
     * @param string|null $stripeParam
     */
    public function setStripeParam($stripeParam)
    {
        $this->stripeParam = $stripeParam;
    }
}
