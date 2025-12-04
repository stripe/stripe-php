<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2IamApiKeyRotatedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.iam.api_key.rotated';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2IamApiKeyRotatedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
