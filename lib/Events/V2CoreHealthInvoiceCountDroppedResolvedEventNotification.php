<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreHealthInvoiceCountDroppedResolvedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.health.invoice_count_dropped.resolved';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreHealthInvoiceCountDroppedResolvedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
