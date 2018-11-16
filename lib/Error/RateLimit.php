<?php

namespace Stripe\Error;

/**
 * RateLimit is raised in cases where an account is putting too much load on Stripe's API servers
 * (usually by performing too many requests). Please back off on request rate.
 *
 * @package Stripe\Error
 */
class RateLimit extends InvalidRequest
{
}
