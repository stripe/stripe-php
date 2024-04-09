<?php

// File generated from our OpenAPI spec

namespace Stripe\Entitlements;

/**
 * A feature represents a monetizable ability or functionality in your system.
 * Features can be assigned to products, and when those products are purchased, Stripe will create an entitlement to the feature for the purchasing customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $active Inactive features cannot be attached to new products and will not be returned from the features list endpoint.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $lookup_key A unique key you provide as your own system identifier. This may be up to 80 characters.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name The feature's name, for your own purpose, not meant to be displayable to the customer.
 */
class Feature extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'entitlements.feature';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
