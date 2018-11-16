<?php

namespace Stripe\Error;

/**
 * SignatureVerificationError is raised when the signature verification for a webhook fails.
 *
 * @package Stripe\Error
 */
class SignatureVerification extends Base
{
    protected $sigHeader;

    public function __construct(
        $message,
        $sigHeader,
        $httpBody = null
    ) {
        parent::__construct($message, null, $httpBody, null, null, null);
        $this->sigHeader = $sigHeader;
    }

    public function getSigHeader()
    {
        return $this->sigHeader;
    }
}
