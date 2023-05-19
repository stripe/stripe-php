<?php

// File generated from our OpenAPI spec

namespace Stripe\Issuing;

/**
 * A Card Design is a logical grouping of a Card Bundle, card logo, and carrier text that represents a product line.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|\Stripe\Issuing\CardBundle $card_bundle The card bundle object belonging to this card design.
 * @property null|string $lookup_key A lookup key used to retrieve card designs dynamically from a static string. This may be up to 200 characters.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $name Friendly display name.
 * @property string $preference Whether this card design is used to create cards when one is not specified.
 * @property string $status Whether this card design can be used to create cards.
 */
class CardDesign extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'issuing.card_design';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;

    const PREFERENCE_DEFAULT = 'default';
    const PREFERENCE_NONE = 'none';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_REJECTED = 'rejected';
    const STATUS_REVIEW = 'review';
}
