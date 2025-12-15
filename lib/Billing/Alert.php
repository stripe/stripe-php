<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A billing alert is a resource that notifies you when a certain usage threshold on a meter is crossed. For example, you might create a billing alert to notify you when a certain user made 100 API requests.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $alert_type Defines the type of the alert.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $status Status of the alert. This can be active, inactive or archived.
 * @property string $title Title of the alert.
 * @property null|(object{filters: null|((object{customer: null|string|\Stripe\Customer, type: string}&\Stripe\StripeObject))[], gte: int, meter: Meter|string, recurrence: string}&\Stripe\StripeObject) $usage_threshold Encapsulates configuration of the alert to monitor usage on a specific <a href="https://docs.stripe.com/api/billing/meter">Billing Meter</a>.
 */
class Alert extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.alert';

    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_INACTIVE = 'inactive';

    /**
     * Creates a billing alert.
     *
     * @param null|array{alert_type: string, expand?: string[], title: string, usage_threshold?: array{filters?: array{customer?: string, type: string}[], gte: int, meter: string, recurrence: string}} $params
     * @param null|array|string $options
     *
     * @return Alert the created resource
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
     * Lists billing active and inactive alerts.
     *
     * @param null|array{alert_type?: string, ending_before?: string, expand?: string[], limit?: int, meter?: string, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<Alert> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a billing alert given an ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return Alert
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
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Alert the activated alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function activate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/activate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Alert the archived alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function archive($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/archive';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return Alert the deactivated alert
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
}
