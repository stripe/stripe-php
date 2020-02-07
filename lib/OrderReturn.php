<?php

namespace Stripe;

/**
 * Class OrderReturn
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount A positive integer in the smallest currency unit (that is, 100 cents for $1.00, or 1 for ¥1, Japanese Yen being a zero-decimal currency) representing the total amount for the returned line item.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property \Stripe\OrderItem[] $items The items included in this order return.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string|\Stripe\Order|null $order The order that this return includes items from.
 * @property string|\Stripe\Refund|null $refund The ID of the refund issued for this return.
 *
 * @package Stripe
 */
class OrderReturn extends ApiResource
{
    const OBJECT_NAME = 'order_return';

    use ApiOperations\All;
    use ApiOperations\Retrieve;
}
