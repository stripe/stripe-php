<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreHealthElementsErrorResolvedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.health.elements_error.resolved';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreHealthElementsErrorResolvedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
