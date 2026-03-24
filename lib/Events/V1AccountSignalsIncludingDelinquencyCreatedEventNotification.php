<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V1AccountSignalsIncludingDelinquencyCreatedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v1.account_signals[delinquency].created';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V1AccountSignalsIncludingDelinquencyCreatedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
