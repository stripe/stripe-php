<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2IamStripeAccessGrantRemovedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.iam.stripe_access_grant.removed';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2IamStripeAccessGrantRemovedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
