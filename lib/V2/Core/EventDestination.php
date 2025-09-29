<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * Set up an event destination to receive events from Stripe across multiple destination types, including <a href="https://docs.stripe.com/webhooks">webhook endpoints</a> and <a href="https://docs.stripe.com/event-destinations/eventbridge">Amazon EventBridge</a>. Event destinations support receiving <a href="https://docs.stripe.com/api/v2/events">thin events</a> and <a href="https://docs.stripe.com/api/events">snapshot events</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{aws_account_id: string, aws_event_source_arn: string, aws_event_source_status: string}&\Stripe\StripeObject) $amazon_eventbridge Amazon EventBridge configuration.
 * @property int $created Time at which the object was created.
 * @property string $description An optional description of what the event destination is used for.
 * @property string[] $enabled_events The list of events to enable for this endpoint.
 * @property string $event_payload Payload type of events being subscribed to.
 * @property null|string[] $events_from Where events should be routed from.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Metadata.
 * @property string $name Event destination name.
 * @property null|string $snapshot_api_version If using the snapshot event payload, the API version events are rendered as.
 * @property string $status Status. It can be set to either enabled or disabled.
 * @property null|(object{disabled?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Additional information about event destination status.
 * @property string $type Event destination type.
 * @property int $updated Time at which the object was last updated.
 * @property null|(object{signing_secret?: string, url?: string}&\Stripe\StripeObject) $webhook_endpoint Webhook endpoint configuration.
 */
class EventDestination extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.event_destination';

    const EVENT_PAYLOAD_SNAPSHOT = 'snapshot';
    const EVENT_PAYLOAD_THIN = 'thin';

    const STATUS_DISABLED = 'disabled';
    const STATUS_ENABLED = 'enabled';

    const TYPE_AMAZON_EVENTBRIDGE = 'amazon_eventbridge';
    const TYPE_WEBHOOK_ENDPOINT = 'webhook_endpoint';
}
