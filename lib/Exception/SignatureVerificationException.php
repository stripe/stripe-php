<?php

namespace Stripe\Exception;

/**
 * SignatureVerificationException is thrown when the signature verification for
 * a webhook fails.
 *
 * @package Stripe\Exception
 */
class SignatureVerificationException extends \Exception implements ExceptionInterface
{
    protected $httpBody;
    protected $sigHeader;

    /**
     * Creates a new SignatureVerificationException exception.
     *
     * @param string $message The exception message.
     * @param string|null $httpBody The HTTP body as a string.
     * @param string|null $sigHeader The `Stripe-Signature` HTTP header.
     *
     * @return SignatureVerificationException
     */
    public static function factory(
        $message,
        $httpBody = null,
        $sigHeader = null
    ) {
        $instance = new static($message);
        $instance->setHttpBody($httpBody);
        $instance->setSigHeader($sigHeader);

        return $instance;
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
     * Gets the `Stripe-Signature` HTTP header.
     *
     * @return string|null
     */
    public function getSigHeader()
    {
        return $this->sigHeader;
    }

    /**
     * Sets the `Stripe-Signature` HTTP header.
     *
     * @param string|null $sigHeader
     */
    public function setSigHeader($sigHeader)
    {
        $this->sigHeader = $sigHeader;
    }
}
