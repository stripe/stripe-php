<?php

namespace Stripe;

/**
 * Class OrderReturn
 *
 * @property string $id
 * @property string $object
 * @property int $amount
 * @property int $created
 * @property string $currency
 * @property \Stripe\OrderItem[] $items
 * @property bool $livemode
 * @property string|\Stripe\Order|null $order
 * @property string|\Stripe\Refund|null $refund
 *
 * @package Stripe
 */
class OrderReturn extends ApiResource
{
    const OBJECT_NAME = 'order_return';

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
