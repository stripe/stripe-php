<?php

namespace Stripe\Exception;

/**
 * InvalidRequestException is thrown when a request is initiated with invalid
 * parameters.
 */
class InvalidRequestException extends ApiErrorException
{
    /**
     * Creates a new InvalidRequestException exception.
     *
     * @param string $message the exception message
     * @param null|int $httpStatus the HTTP status code
     * @param null|string $httpBody the HTTP body as a string
     * @param null|array $jsonBody the JSON deserialized body
     * @param null|array|\Stripe\Util\CaseInsensitiveArray $httpHeaders the HTTP headers array
     * @param null|string $stripeCode the Stripe error code
     * @param null|string $stripeParam the parameter related to the error
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
        return parent::factory($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode, $stripeParam);
    }
}
