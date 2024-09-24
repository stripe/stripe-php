<?php

// File generated from our OpenAPI spec

namespace Stripe\V2;

/**
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|\Stripe\StripeObject $amazon_eventbridge Amazon EventBridge configuration.
 * @property int $created Time at which the object was created.
 * @property string $description An optional description of what the event destination is used for.
 * @property string[] $enabled_events The list of events to enable for this endpoint.
 * @property string $event_namespace Closed Enum. Namespace of events being subscribed to.
 * @property null|string[] $events_from Open Enum. Where events should be routed from.
 * @property null|\Stripe\StripeObject $metadata Metadata.
 * @property string $name Event destination name.
 * @property string $status Closed Enum. Status. It can be set to either enabled or disabled.
 * @property null|\Stripe\StripeObject $status_details Additional information about event destination status.
 * @property string $type Closed Enum. Event destination type.
 * @property int $updated Time at which the object was last updated.
 * @property null|string $v1_api_version If using the v1 event namespace, the API version events are rendered as.
 * @property null|\Stripe\StripeObject $webhook_endpoint Webhook endpoint configuration.
 */
class EventDestination extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'event_destination';

    const EVENT_NAMESPACE_V1 = 'v1';
    const EVENT_NAMESPACE_V2 = 'v2';

    const STATUS_DISABLED = 'disabled';
    const STATUS_ENABLED = 'enabled';

    const TYPE_AMAZON_EVENTBRIDGE = 'amazon_eventbridge';
    const TYPE_WEBHOOK_ENDPOINT = 'webhook_endpoint';
}
