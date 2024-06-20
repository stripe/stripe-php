<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A billing meter is a resource that allows you to track usage of a particular event. For example, you might create a billing meter to track the number of API calls made by a particular user. You can then attach the billing meter to a price and attach the price to a subscription to charge the user for the number of API calls they make.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property \Stripe\StripeObject $customer_mapping
 * @property \Stripe\StripeObject $default_aggregation
 * @property string $display_name The meter's name.
 * @property string $event_name The name of the meter event to record usage for. Corresponds with the <code>event_name</code> field on meter events.
 * @property null|string $event_time_window The time window to pre-aggregate meter events for, if any.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The meter's status.
 * @property \Stripe\StripeObject $status_transitions
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 * @property \Stripe\StripeObject $value_settings
 */
class Meter extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.meter';

    use \Stripe\ApiOperations\NestedResource;
    use \Stripe\ApiOperations\Update;

    const EVENT_TIME_WINDOW_DAY = 'day';
    const EVENT_TIME_WINDOW_HOUR = 'hour';

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    /**
     * Creates a billing meter.
     *
     * @param null|array $params
     * @param null|array|string $options
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\Meter the created resource
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
     * Retrieve a list of billing meters.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Billing\Meter> of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a billing meter given an ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\Meter
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = \Stripe\Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates a billing meter.
     *
     * @param string $id the ID of the resource to update
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\Meter the updated resource
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

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\Meter the deactivated meter
     */
    public function deactivate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/deactivate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Billing\Meter the reactivated meter
     */
    public function reactivate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/reactivate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    const PATH_EVENT_SUMMARIES = '/event_summaries';

    /**
     * @param string $id the ID of the meter on which to retrieve the meter event summaries
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Collection<\Stripe\Billing\MeterEventSummary> the list of meter event summaries
     */
    public static function allEventSummaries($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_EVENT_SUMMARIES, $params, $opts);
    }
}
