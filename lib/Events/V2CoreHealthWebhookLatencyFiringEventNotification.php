<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreHealthWebhookLatencyFiringEventNotification extends \Stripe\V2\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.health.webhook_latency.firing';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreHealthWebhookLatencyFiringEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
