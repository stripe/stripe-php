<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Core;

/**
 * Set up an event destination to receive events from Stripe across multiple destination types, including <a href="https://docs.stripe.com/webhooks">webhook endpoints</a>, <a href="https://docs.stripe.com/event-destinations/eventbridge">Amazon EventBridge</a>, and <a href="https://docs.stripe.com/event-destinations/eventgrid">Azure Event Grid</a>. Event destinations support receiving <a href="https://docs.stripe.com/api/v2/events">thin events</a> and <a href="https://docs.stripe.com/api/events">snapshot events</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{aws_account_id: string, aws_event_source_arn: string, aws_event_source_status: string}&\Stripe\StripeObject) $amazon_eventbridge Configuration for delivering events through an Amazon EventBridge partner event source.
 * @property null|(object{azure_partner_topic_name: string, azure_partner_topic_status: string, azure_region: string, azure_resource_group_name: string, azure_subscription_id: string}&\Stripe\StripeObject) $azure_event_grid Configuration for delivering events through an Azure Event Grid partner topic.
 * @property string $created The time when the destination was created.
 * @property string $description An optional user-defined description of the destination's purpose.
 * @property string[] $enabled_events The list of event types enabled for delivery to this destination.
 * @property string $event_payload Whether to deliver as snapshot or thin events.
 * @property null|string[] $events_from Specifies which accounts' events route to this destination. <code>@self</code>: Receive events from the account that owns the event destination. <code>@accounts</code>: Receive events emitted from other accounts you manage which includes your v1 and v2 accounts. <code>@organization_members</code>: Receive events from accounts directly linked to the organization. <code>@organization_members/@accounts</code>: Receive events from all accounts connected to any platform accounts in the organization.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata User-defined key/value data for the destination; it has no effect on event matching or delivery.
 * @property string $name A user-defined label for identifying the destination in Stripe.
 * @property null|string $snapshot_api_version For snapshot events only, the Stripe API version used to render event objects. You can't change this value after you create the event destination. Thin events are not pinned to an API version.
 * @property string $status Whether Stripe currently attempts delivery. Stripe attempts delivery to enabled destinations when their provider configuration is active; disabled destinations do not receive delivery attempts.
 * @property null|(object{disabled?: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Additional lifecycle context for the destination status, when available.
 * @property string $type The delivery transport. Chosen when the destination is created and cannot be changed by update.
 * @property string $updated The time when the destination object was last updated.
 * @property null|(object{signing_secret?: string, url?: string}&\Stripe\StripeObject) $webhook_endpoint Configuration for delivering events to a webhook endpoint. Live mode requires HTTPS; sandbox mode also supports HTTP.
 */
class EventDestination extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.core.event_destination';

    const EVENT_PAYLOAD_SNAPSHOT = 'snapshot';
    const EVENT_PAYLOAD_THIN = 'thin';

    const STATUS_DISABLED = 'disabled';
    const STATUS_ENABLED = 'enabled';

    const TYPE_AMAZON_EVENTBRIDGE = 'amazon_eventbridge';
    const TYPE_AZURE_EVENT_GRID = 'azure_event_grid';
    const TYPE_WEBHOOK_ENDPOINT = 'webhook_endpoint';
}
