<?php

// File generated from our OpenAPI spec

namespace Stripe\Entitlements;

/**
 * An active entitlement describes access to a feature for a customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $feature The feature that the customer is entitled to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $lookup_key A unique key you provide as your own system identifier. This may be up to 80 characters.
 */
class ActiveEntitlement extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'entitlements.active_entitlement';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
}
