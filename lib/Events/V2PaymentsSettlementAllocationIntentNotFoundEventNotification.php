<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2PaymentsSettlementAllocationIntentNotFoundEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.payments.settlement_allocation_intent.not_found';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2PaymentsSettlementAllocationIntentNotFoundEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
