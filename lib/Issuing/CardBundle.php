<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * A Card Bundle represents the bundle of physical items - card stock, carrier letter, and envelope - that is shipped to a cardholder when you create a physical card.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $name Friendly display name.
 * @property string $status Whether this card bundle can be used to create cards.
 * @property string $type Whether this card bundle is a standard Stripe offering or custom-made for you.
 */
class CardBundle extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.card_bundle';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_REVIEW = 'review';

    const TYPE_CUSTOM = 'custom';
    const TYPE_STANDARD = 'standard';
}
