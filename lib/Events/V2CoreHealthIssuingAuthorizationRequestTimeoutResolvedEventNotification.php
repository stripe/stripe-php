<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEventNotification extends \Stripe\V2\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.health.issuing_authorization_request_timeout.resolved';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreHealthIssuingAuthorizationRequestTimeoutResolvedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
