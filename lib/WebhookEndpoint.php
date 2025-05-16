<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * You can configure <a href="https://docs.stripe.com/webhooks/">webhook endpoints</a> via the API to be
 * notified about events that happen in your Stripe account or connected
 * accounts.
 *
 * Most users configure webhooks from <a href="https://dashboard.stripe.com/webhooks">the dashboard</a>, which provides a user interface for registering and testing your webhook endpoints.
 *
 * Related guide: <a href="https://docs.stripe.com/webhooks/configure">Setting up webhooks</a>
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $api_version The API version events are rendered as for this webhook endpoint.
 * @property null|string $application The ID of the associated Connect application.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $description An optional description of what the webhook is used for.
 * @property string[] $enabled_events The list of events to enable for this endpoint. <code>['*']</code> indicates that all events are enabled, except those that require explicit selection.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $secret The endpoint's secret, used to generate <a href="https://docs.stripe.com/webhooks/signatures">webhook signatures</a>. Only returned at creation.
 * @property string $status The status of the webhook. It can be <code>enabled</code> or <code>disabled</code>.
 * @property string $url The URL of the webhook endpoint.
 */
class WebhookEndpoint extends ApiResource
{
    const OBJECT_NAME = 'webhook_endpoint';

    use ApiOperations\Update;

    /**
     * A webhook endpoint must have a <code>url</code> and a list of
     * <code>enabled_events</code>. You may optionally specify the Boolean
     * <code>connect</code> parameter. If set to true, then a Connect webhook endpoint
     * that notifies the specified <code>url</code> about events from all connected
     * accounts is created; otherwise an account webhook endpoint that notifies the
     * specified <code>url</code> only about events from your account is created. You
     * can also create webhook endpoints in the <a
     * href="https://dashboard.stripe.com/account/webhooks">webhooks settings</a>
     * section of the Dashboard.
     *
     * @param null|array{api_version?: string, connect?: bool, description?: null|string, enabled_events: string[], expand?: string[], metadata?: null|array<string, string>, url: string} $params
     * @param null|array|string $options
     *
     * @return WebhookEndpoint the created resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }

    /**
     * You can also delete webhook endpoints via the <a
     * href="https://dashboard.stripe.com/account/webhooks">webhook endpoint
     * management</a> page of the Stripe dashboard.
     *
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @return WebhookEndpoint the deleted resource
     *
     * @throws Exception\ApiErrorException if the request fails
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
     * Returns a list of your webhook endpoints.
     *
     * @param null|array{ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|array|string $opts
     *
     * @return Collection<WebhookEndpoint> of ApiResources
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function all($params = null, $opts = null)
    {
        $url = static::classUrl();

        return static::_requestPage($url, Collection::class, $params, $opts);
    }

    /**
     * Retrieves the webhook endpoint with the given ID.
     *
     * @param array|string $id the ID of the API resource to retrieve, or an options array containing an `id` key
     * @param null|array|string $opts
     *
     * @return WebhookEndpoint
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function retrieve($id, $opts = null)
    {
        $opts = Util\RequestOptions::parse($opts);
        $instance = new static($id, $opts);
        $instance->refresh();

        return $instance;
    }

    /**
     * Updates the webhook endpoint. You may edit the <code>url</code>, the list of
     * <code>enabled_events</code>, and the status of your endpoint.
     *
     * @param string $id the ID of the resource to update
     * @param null|array{description?: null|string, disabled?: bool, enabled_events?: string[], expand?: string[], metadata?: null|array<string, string>, url?: string} $params
     * @param null|array|string $opts
     *
     * @return WebhookEndpoint the updated resource
     *
     * @throws Exception\ApiErrorException if the request fails
     */
    public static function update($id, $params = null, $opts = null)
    {
        self::_validateParams($params);
        $url = static::resourceUrl($id);

        list($response, $opts) = static::_staticRequest('post', $url, $params, $opts);
        $obj = Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);

        return $obj;
    }
}
