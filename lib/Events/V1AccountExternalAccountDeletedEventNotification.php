<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V1AccountExternalAccountDeletedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v1.account.external_account.deleted';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V1AccountExternalAccountDeletedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
