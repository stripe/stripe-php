<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V1BillingPortalSessionCreatedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v1.billing_portal.session.created';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V1BillingPortalSessionCreatedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
