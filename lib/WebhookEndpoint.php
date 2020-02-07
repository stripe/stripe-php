<?php

namespace Stripe;

/**
 * Class WebhookEndpoint
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property string|null $api_version The API version events are rendered as for this webhook endpoint.
 * @property string|null $application The ID of the associated Connect application.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string[] $enabled_events The list of events to enable for this endpoint. <code>['*']</code> indicates that all events are enabled, except those that require explicit selection.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $secret The endpoint's secret, used to generate <a href="https://stripe.com/docs/webhooks/signatures">webhook signatures</a>. Only returned at creation.
 * @property string $status The status of the webhook. It can be <code>enabled</code> or <code>disabled</code>.
 * @property string $url The URL of the webhook endpoint.
 *
 * @package Stripe
 */
class WebhookEndpoint extends ApiResource
{
    const OBJECT_NAME = 'webhook_endpoint';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
