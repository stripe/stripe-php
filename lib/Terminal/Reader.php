<?php

namespace Stripe\Terminal;

/**
 * Class Reader
 *
 * @property string $id
 * @property string $object
 * @property string|null $device_sw_version
 * @property string $device_type
 * @property string|null $ip_address
 * @property string $label
 * @property bool $livemode
 * @property string|null $location
 * @property \Stripe\StripeObject $metadata
 * @property string $serial_number
 * @property string|null $status
 *
 * @package Stripe\Terminal
 */
class Reader extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'terminal.reader';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
