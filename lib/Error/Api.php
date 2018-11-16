<?php

namespace Stripe\Error;

/**
 * Api is a generic error that may be raised in cases where none of the other named errors cover
 * the problem. It could also be raised in the case that a new error has been introduced in the API,
 * but this version of the PHP SDK doesn't know how to handle it.
 *
 * @package Stripe\Error
 */
class Api extends Base
{
}
