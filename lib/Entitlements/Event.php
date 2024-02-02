<?php

// File generated from our OpenAPI spec

namespace Stripe\Entitlements;

/**
 * An entitlement event either grants or revokes an entitlement to a feature for a customer.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $customer The customer that is being granted or revoked entitlement to/from a feature.
 * @property string $feature The feature that the customer is being granted/revoked entitlement to/from.
 * @property null|\Stripe\StripeObject $grant Contains information about type=grant entitlement event.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $quantity Contains information about entitlement events relating to features with type=quantity. Required when the feature has type=quantity.
 * @property null|\Stripe\StripeObject $revoke Contains information about type=revoke entitlement event.
 * @property string $type Whether the event is a grant or revocation of the feature.
 */
class Event extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'entitlements.event';

    use \Stripe\ApiOperations\Create;

    const TYPE_GRANT = 'grant';
    const TYPE_REVOKE = 'revoke';
}
