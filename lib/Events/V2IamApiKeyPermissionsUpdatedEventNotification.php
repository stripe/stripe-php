<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2IamApiKeyPermissionsUpdatedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.iam.api_key.permissions_updated';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2IamApiKeyPermissionsUpdatedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
