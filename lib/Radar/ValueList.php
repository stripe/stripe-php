<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Value lists allow you to group values together which can then be referenced in rules.
 *
 * Related guide: <a href="https://stripe.com/docs/radar/lists#managing-list-items">Default Stripe lists</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $alias The name of the value list for use in rules.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $created_by The name or email address of the user who created this value list.
 * @property string $item_type The type of items in the value list. One of <code>card_fingerprint</code>, <code>us_bank_account_fingerprint</code>, <code>sepa_debit_fingerprint</code>, <code>card_bin</code>, <code>email</code>, <code>ip_address</code>, <code>country</code>, <code>string</code>, <code>case_sensitive_string</code>, or <code>customer_id</code>.
 * @property \Stripe\Collection<\Stripe\Radar\ValueListItem> $list_items List of items contained within this value list.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
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

    const ITEM_TYPE_CARD_BIN = 'card_bin';
    const ITEM_TYPE_CARD_FINGERPRINT = 'card_fingerprint';
    const ITEM_TYPE_CASE_SENSITIVE_STRING = 'case_sensitive_string';
    const ITEM_TYPE_COUNTRY = 'country';
    const ITEM_TYPE_CUSTOMER_ID = 'customer_id';
    const ITEM_TYPE_EMAIL = 'email';
    const ITEM_TYPE_IP_ADDRESS = 'ip_address';
    const ITEM_TYPE_SEPA_DEBIT_FINGERPRINT = 'sepa_debit_fingerprint';
    const ITEM_TYPE_STRING = 'string';
    const ITEM_TYPE_US_BANK_ACCOUNT_FINGERPRINT = 'us_bank_account_fingerprint';
}
