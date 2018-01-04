<?php

namespace Stripe;

/**
 * Class Plan
 *
 * @package Stripe
 *
 * @property $id
 * @property $object
 * @property $amount
 * @property $created
 * @property $currency
 * @property $interval
 * @property $interval_count
 * @property $livemode
 * @property AttachedObject $metadata
 * @property $name
 * @property $statement_descriptor
 * @property $trial_period_days
 */
class Plan extends ApiResource
{
    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
