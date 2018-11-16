<?php

namespace Stripe\Error\OAuth;

/**
 * InvalidRequest is raised when a code, refresh token, or grant type parameter is not provided, but
 * was required.
 *
 * @package Stripe\Error\OAuth
 */
class InvalidRequest extends OAuthBase
{
}
