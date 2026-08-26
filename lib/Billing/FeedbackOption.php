<?php

// File generated from our OpenAPI spec

namespace Stripe\Billing;

/**
 * A resource for the feedback options model (for custom cancellation reasons).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 * @property string $status The feedback option's status.
 * @property (object{deactivated_at: null|int}&\Stripe\StripeObject) $status_transitions
 */
class FeedbackOption extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'billing.feedback_option';

    use \Stripe\ApiOperations\Update;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    /**
     * Creates a new feedback option.
     *
     * @param null|array{description: string, expand?: string[]} $params
     * @param null|array|string $options
     *
     * @return FeedbackOption the created resource
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
     * An API method for listing the feedback options model.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<FeedbackOption> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieves a feedback options object given an ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return FeedbackOption
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
     * Updates the description of an existing feedback option.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{description?: string, expand?: string[]} $params
     * @param null|array|string $opts
     *
     * @return FeedbackOption the updated resource
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
     * @return FeedbackOption the deactivated feedback option
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
