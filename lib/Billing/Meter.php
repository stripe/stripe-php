<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * Meters specify how to aggregate meter events over a billing period. Meter events represent the actions that customers take in your system. Meters attach to prices and form the basis of the bill.
 *
 * Related guide: <a href="https://docs.stripe.com/billing/subscriptions/usage-based">Usage based billing</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property (object{event_payload_key: string, type: string}&\Stripe\StripeObject) $customer_mapping
 * @property (object{formula: string}&\Stripe\StripeObject) $default_aggregation
 * @property string $display_name The meter's name.
 * @property string $event_name The name of the meter event to record usage for. Corresponds with the <code>event_name</code> field on meter events.
 * @property null|string $event_time_window The time window to pre-aggregate meter events for, if any.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status The meter's status.
 * @property (object{deactivated_at: null|int}&\Stripe\StripeObject) $status_transitions
 * @property int $updated Time at which the object was last updated. Measured in seconds since the Unix epoch.
 * @property (object{event_payload_key: string}&\Stripe\StripeObject) $value_settings
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
     * @param null|array{customer_mapping?: array{event_payload_key: string, type: string}, default_aggregation: array{formula: string}, display_name: string, event_name: string, event_time_window?: string, expand?: string[], value_settings?: array{event_payload_key: string}} $params
     * @param null|array|string $options
     *
     * @return Meter the created resource
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
     * Retrieve a list of billing meters.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Meter> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return Meter
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
     * Updates a billing meter.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{display_name?: string, expand?: string[]} $params
     * @param null|array|string $opts
     *
     * @return Meter the updated resource
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

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Meter the deactivated meter
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return Meter the reactivated meter
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
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
     * @return \Stripe\Collection<MeterEventSummary> the list of meter event summaries
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function allEventSummaries($id, $params = null, $opts = null)
    {
        return self::_allNestedResources($id, static::PATH_EVENT_SUMMARIES, $params, $opts);
    }
}
