<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V2CoreEventDestinationPingEventNotification extends \Stripe\V2\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.event_destination.ping';
    public $related_object;

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Stripe\V2\EventDestination
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        return parent::fetchRelatedObject();
    }
}
