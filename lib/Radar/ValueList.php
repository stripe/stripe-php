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
 * @property \Stripe\Collection<ValueListItem> $list_items List of items contained within this value list.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $name The name of the value list.
 */
class ValueList extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.value_list';

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

    /**
     * Creates a new <code>ValueList</code> object, which can then be referenced in
     * rules.
     *
     * @param null|array{alias: string, expand?: string[], item_type?: string, metadata?: array<string, string>, name: string} $params
     * @param null|array|string $options
     *
     * @return ValueList the created resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * Deletes a <code>ValueList</code> object, also deleting any items contained
     * within the value list. To be deleted, a value list must not be referenced in any
     * rules.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return ValueList the deleted resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function delete($params = null, $opts = null)
    {
        self::_validateParams($params);

        $url = $this->instanceUrl();
        list($response, $opts) = $this->_request('delete', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * Returns a list of <code>ValueList</code> objects. The objects are sorted in
     * descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|array{alias?: string, contains?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<ValueList> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>ValueList</code> object.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return ValueList
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a <code>ValueList</code> object by setting the values of the parameters
     * passed. Any parameters not provided will be left unchanged. Note that
     * <code>item_type</code> is immutable.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{alias?: string, expand?: string[], metadata?: array<string, string>, name?: string} $params
     * @param null|array|string $opts
     *
     * @return ValueList the updated resource
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
