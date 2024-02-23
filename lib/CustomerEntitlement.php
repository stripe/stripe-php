<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * A entitlement for a customer describes access to a feature.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $feature The feature that the customer is entitled to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $lookup_key A unique key you provide as your own system identifier. This may be up to 80 characters.
 * @property null|\Stripe\StripeObject $quantity Contains information about entitlements relating to features with type=quantity. Required when the feature has type=quantity.
 * @property string $type The type of feature.
 */
class CustomerEntitlement extends ApiResource
{
    const OBJECT_NAME = 'customer_entitlement';

    const TYPE_QUANTITY = 'quantity';
    const TYPE_SWITCH = 'switch';
}
