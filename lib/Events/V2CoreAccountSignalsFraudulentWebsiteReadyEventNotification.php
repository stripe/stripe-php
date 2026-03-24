<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreAccountSignalsFraudulentWebsiteReadyEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.account_signals.fraudulent_website_ready';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreAccountSignalsFraudulentWebsiteReadyEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
