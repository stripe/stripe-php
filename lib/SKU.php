<?php

namespace Stripe;

/**
 * Class SKU
 *
 * @property string $id
 * @property string $object
 * @property bool $active
 * @property \Stripe\StripeObject $attributes
 * @property int $created
 * @property string $currency
 * @property string|null $image
 * @property \Stripe\StripeObject $inventory
 * @property bool $livemode
 * @property \Stripe\StripeObject $metadata
 * @property \Stripe\StripeObject|null $package_dimensions
 * @property int $price
 * @property string|\Stripe\Product $product
 * @property int $updated
 *
 * @package Stripe
 */
class SKU extends ApiResource
{
    const OBJECT_NAME = 'sku';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
