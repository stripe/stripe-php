<?php

namespace Stripe\Terminal;

/**
 * Class Location
 *
 * @property string $id
 * @property string $object
 * @property \Stripe\StripeObject $address
 * @property string $display_name
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 *
 * @package Stripe\Terminal
 */
class Location extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.location';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
