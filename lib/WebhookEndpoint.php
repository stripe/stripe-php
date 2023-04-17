<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * You can configure [webhook endpoints](https://stripe.com/docs/webhooks/) via the API to be notified about events that happen in your Stripe
 * account or connected accounts.
 *
 * Most users configure webhooks from [the dashboard](https://dashboard.stripe.com/webhooks), which provides a
 * user interface for registering and testing your webhook endpoints.
 *
 * Related guide: [Setting up Webhooks](https://stripe.com/docs/webhooks/configure).
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property null|string $api_version The API version events are rendered as for this webhook endpoint.
 * @property null|string $application The ID of the associated Connect application.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property null|string $description An optional description of what the webhook is used for.
 * @property string[] $enabled_events The list of events to enable for this endpoint. `['*']` indicates that all events are enabled, except those that require explicit selection.
 * @property bool $livemode Has the value `true` if the object exists in live mode or the value `false` if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of [key-value pairs](https://stripe.com/docs/api/metadata) that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property null|string $secret The endpoint's secret, used to generate [webhook signatures](https://stripe.com/docs/webhooks/signatures). Only returned at creation.
 * @property string $status The status of the webhook. It can be `enabled` or `disabled`.
 * @property string $url The URL of the webhook endpoint.
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
