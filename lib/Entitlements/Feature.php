<?php

// File generated from our OpenAPI spec

namespace Stripe\Entitlements;

/**
 * A feature represents a monetizable ability or functionality in your system.
 * Features can be assigned to products, and when those products are purchased, Stripe will create an entitlement to the feature for the purchasing customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $lookup_key A unique key you provide as your own system identifier. This may be up to 80 characters.
 * @property string $name The feature's name, for your own purpose, not meant to be displayable to the customer.
 * @property null|\Stripe\StripeObject $quantity Contains information about type=quantity features. This is required when type=quantity.
 * @property string $type The type of feature.
 */
class Feature extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'entitlements.feature';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;

    const TYPE_QUANTITY = 'quantity';
    const TYPE_SWITCH = 'switch';
}
