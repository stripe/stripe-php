<?php

namespace Stripe\Exception;

/**
 * InvalidRequestException is thrown when a request is initiated with invalid
 * parameters.
 */
class InvalidRequestException extends ApiErrorException
{
    protected $stripeParam;

    /**
     * Creates a new InvalidRequestException exception.
     *
     * @param string $message The exception message.
     * @param null|int $httpStatus The HTTP status code.
     * @param null|string $httpBody The HTTP body as a string.
     * @param null|array $jsonBody The JSON deserialized body.
     * @param null|array|\Stripe\Util\CaseInsensitiveArray $httpHeaders The HTTP headers array.
     * @param null|string $stripeCode The Stripe error code.
     * @param null|string $stripeParam The parameter related to the error.
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
     * @return null|string
     */
    public function getStripeParam()
    {
        return $this->stripeParam;
    }

    /**
     * Sets the parameter related to the error.
     *
     * @param null|string $stripeParam
     */
    public function setStripeParam($stripeParam)
    {
        $this->stripeParam = $stripeParam;
    }
}
