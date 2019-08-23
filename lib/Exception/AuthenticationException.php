<?php

namespace Stripe\Exception;

/**
 * AuthenticationException is thrown when invalid credentials are used to
 * connect to Stripe's servers.
 *
 * @package Stripe\Exception
 */
class AuthenticationException extends ApiErrorException
{
}
