<?php

namespace Stripe\Error;

/**
 * ApiConnection is raised in the event that the SDK can't connect to Stripe's servers. That can be
 * for a variety of different reasons from a downed network to a bad TLS certificate.
 *
 * @package Stripe\Error
 */
class ApiConnection extends Base
{
}
