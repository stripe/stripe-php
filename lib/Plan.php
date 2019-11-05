<?php

namespace Stripe;

/**
 * Class Plan
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property string|null $aggregate_usage
 * @property int|null $amount
 * @property string|null $amount_decimal
 * @property string|null $billing_scheme
 * @property int $created
 * @property string $currency
 * @property string $interval
 * @property int $interval_count
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property string|null $nickname
 * @property string|null $product
 * @property mixed|null $tiers
 * @property string|null $tiers_mode
 * @property mixed|null $transform_usage
 * @property int|null $trial_period_days
 * @property string $usage_type
 *
 * @package Stripe
 */
class Plan extends ApiResource
{
    const OBJECT_NAME = 'plan';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
