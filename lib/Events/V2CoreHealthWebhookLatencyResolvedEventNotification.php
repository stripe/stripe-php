<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreHealthWebhookLatencyResolvedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.health.webhook_latency.resolved';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreHealthWebhookLatencyResolvedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
