<?php

namespace Stripe\Exception\OAuth;

/**
 * InvalidRequestException is thrown when a code, refresh token, or grant
 * type parameter is not provided, but was required.
 *
 * @package Stripe\Exception\OAuth
 */
class InvalidRequestException extends OAuthErrorException
{
}
