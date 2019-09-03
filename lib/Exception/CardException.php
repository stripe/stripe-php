<?php

namespace Stripe\Exception;

/**
 * CardException is thrown when a user enters a card that can't be charged for
 * some reason.
 *
 * @package Stripe\Exception
 */
class CardException extends ApiErrorException
{
    protected $declineCode;
    protected $stripeParam;

    /**
     * Creates a new CardException exception.
     *
     * @param string $message The exception message.
     * @param int|null $httpStatus The HTTP status code.
     * @param string|null $httpBody The HTTP body as a string.
     * @param array|null $jsonBody The JSON deserialized body.
     * @param array|\Stripe\Util\CaseInsensitiveArray|null $httpHeaders The HTTP headers array.
     * @param string|null $stripeCode The Stripe error code.
     * @param string|null $declineCode The decline code.
     * @param string|null $stripeParam The parameter related to the error.
     *
     * @return CardException
     */
    public static function factory(
        $message,
        $httpStatus = null,
        $httpBody = null,
        $jsonBody = null,
        $httpHeaders = null,
        $stripeCode = null,
        $declineCode = null,
        $stripeParam = null
    ) {
        $instance = parent::factory($message, $httpStatus, $httpBody, $jsonBody, $httpHeaders, $stripeCode);
        $instance->setDeclineCode($declineCode);
        $instance->setStripeParam($stripeParam);

        return $instance;
    }

    /**
     * Gets the decline code.
     *
     * @return string|null
     */
    public function getDeclineCode()
    {
        return $this->declineCode;
    }

    /**
     * Sets the decline code.
     *
     * @param string|null $declineCode
     */
    public function setDeclineCode($declineCode)
    {
        $this->declineCode = $declineCode;
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
