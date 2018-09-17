<?php

namespace Stripe\Terminal;

/**
 * Class ConnectionToken
 *
 * @property string $connection_token
 *
 * @package Stripe\Terminal
 */
class ConnectionToken extends \Stripe\ApiResource
{
    const OBJECT_NAME = "terminal.connection_token";

    use \Stripe\ApiOperations\Create;
}