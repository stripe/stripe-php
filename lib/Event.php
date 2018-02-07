<?php

namespace Stripe;

/**
 * Class Event
 *
 * @property string $id
 * @property string $object
 * @property string $api_version
 * @property int $created
 * @property mixed $data
 * @property bool $livemode
 * @property int $pending_webhooks
 * @property mixed $request
 * @property string $type
 *
 * @package Stripe
 */
class Event extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
