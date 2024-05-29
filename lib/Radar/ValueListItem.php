<?php

// File generated from our OpenAPI spec

namespace Stripe\Radar;

/**
 * Value list items allow you to add specific values to a given Radar value list, which can then be used in rules.
 *
 * Related guide: <a href="https://stripe.com/docs/radar/lists#managing-list-items">Managing list items</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $created_by The name or email address of the user who added this item to the value list.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $value The value of the item.
 * @property string $value_list The identifier of the value list this item belongs to.
 */
class ValueListItem extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'radar.value_list_item';

    /**
     * Creates a new <code>ValueListItem</code> object, which is added to the specified
     * parent value list.
     *
     * @param null|mixed $params
     * @param null|mixed $options
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
     * Deletes a <code>ValueListItem</code> object, removing it from its parent value
     * list.
     *
     * @param null|mixed $params
     * @param null|mixed $opts
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
     * Returns a list of <code>ValueListItem</code> objects. The objects are sorted in
     * descending order by creation date, with the most recently created object
     * appearing first.
     *
     * @param null|mixed $params
     * @param null|mixed $opts
     */
    public static function all($params = null, $opts = null)
    {
        return static::_requestPage('/v1/radar/value_list_items', \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a <code>ValueListItem</code> object.
     *
     * @param mixed $id
     * @param null|mixed $opts
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }
}
