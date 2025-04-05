<?php

// File generated from our OpenAPI spec

namespace Stripe\Privacy;

/**
 * Redaction Jobs store the status of a redaction request. They are created
 * when a redaction request is made and track the redaction validation and execution.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|RedactionJobRootObjects $objects The objects at the root level that are subject to redaction.
 * @property string $status The status field represents the current state of the redaction job. It can take on any of the following values: VALIDATING, READY, REDACTING, SUCCEEDED, CANCELED, FAILED.
 * @property null|string $validation_behavior Default is &quot;error&quot;. If &quot;error&quot;, we will make sure all objects in the graph are redactable in the 1st traversal, otherwise error. If &quot;fix&quot;, where possible, we will auto-fix any validation errors (e.g. by auto-transitioning objects to a terminal state, etc.) in the 2nd traversal before redacting
 */
class RedactionJob extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'privacy.redaction_job';

    use \Stripe\ApiOperations\Update;

    /**
     * Create redaction job method.
     *
     * @param null|array{expand?: string[], objects: array{charges?: string[], checkout_sessions?: string[], customers?: string[], identity_verification_sessions?: string[], invoices?: string[], issuing_cardholders?: string[], issuing_cards?: string[], payment_intents?: string[], radar_value_list_items?: string[], setup_intents?: string[]}, validation_behavior?: string} $params
     * @param null|array|string $options
     *
     * @return RedactionJob the created resource
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
     * List redaction jobs method...
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|array|string $opts
     *
     * @return \Stripe\Collection<RedactionJob> of ApiResources
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, \Stripe\Collection::class, $params, $opts);
    }

    /**
     * Retrieve redaction job method.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return RedactionJob
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
     * Update redaction job method.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{expand?: string[], validation_behavior?: string} $params
     * @param null|array|string $opts
     *
     * @return RedactionJob the updated resource
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
     * @return RedactionJob the canceled redaction job
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return RedactionJob the runed redaction job
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function run($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/run';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return RedactionJob the validated redaction job
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function validate($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/validate';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
