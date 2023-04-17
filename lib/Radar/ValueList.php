<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Value lists allow you to group values together which can then be referenced in
 * rules.
 *
 * Related guide: [Default Stripe Lists](https://stripe.com/docs/radar/lists#managing-list-items).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $alias The name of the value list for use in rules.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $created_by The name or email address of the user who created this value list.
 * @property string $item_type The type of items in the value list. One of `card_fingerprint`, `card_bin`, `email`, `ip_address`, `country`, `string`, `case_sensitive_string`, or `customer_id`.
 * @property \Stripe\Collection<\Stripe\Radar\ValueListItem> $list_items List of items contained within this value list.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name The name of the value list.
 */
class ValueList extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.value_list';

    use \Stripe\ApiOperations\All;
    use \Stripe\ApiOperations\Create;
    use \Stripe\ApiOperations\Delete;
    use \Stripe\ApiOperations\Retrieve;
    use \Stripe\ApiOperations\Update;
}
