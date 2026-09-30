<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V1EntitlementsActiveEntitlementSummaryUpdatedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v1.entitlements.active_entitlement_summary.updated';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V1EntitlementsActiveEntitlementSummaryUpdatedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
