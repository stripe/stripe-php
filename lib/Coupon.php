<?php

namespace Stripe;

/**
 * Class Coupon
 *
 * @property string $id
 * @property string $object
 * @property int|null $amount_off
 * @property int $created
 * @property string|null $currency
 * @property string $duration
 * @property int|null $duration_in_months
 * @property bool $livemode
 * @property int|null $max_redemptions
 * @property \Stripe\StripeObject $metadata
 * @property string|null $name
 * @property float|null $percent_off
 * @property int|null $redeem_by
 * @property int $times_redeemed
 * @property bool $valid
 *
 * @package Stripe
 */
class Coupon extends ApiResource
{
    const OBJECT_NAME = 'coupon';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
