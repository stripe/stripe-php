<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreHealthSepaDebitDelayedResolvedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.health.sepa_debit_delayed.resolved';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreHealthSepaDebitDelayedResolvedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
