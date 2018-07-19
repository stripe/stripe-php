<?php

namespace Stripe;

/**
 * Class SubscriptionItem
 *
 * @property string $id
 * @property string $object
 * @property int $created
 * @property StripeObject $metadata
 * @property Plan $plan
 * @property int $quantity
 * @property string $subscription
 *
 * @package Stripe
 */
class SubscriptionItem extends ApiResource
{

    const OBJECT_NAME = "subscription_item";

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
