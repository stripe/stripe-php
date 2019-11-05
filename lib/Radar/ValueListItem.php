<?php

namespace Stripe\Radar;

/**
 * Class ValueListItem
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property string $created_by
 * @property bool $livemode
 * @property string $value
 * @property string $value_list
 *
 * @package Stripe\Radar
 */
class ValueListItem extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.value_list_item';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
}
