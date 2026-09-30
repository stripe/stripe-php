<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V1AccountExternalAccountCreatedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v1.account.external_account.created';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V1AccountExternalAccountCreatedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
