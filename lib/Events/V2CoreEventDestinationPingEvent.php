<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2CoreEventDestinationPingEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v2.core.event_destination.ping';

    /**
     * @var \Stripe\RelatedObject Object containing the reference to API resource relevant to the event
     */
    public $related_object;

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\V2\EventDestination
     */
    public function fetchRelatedObject()
    {
        list($object, $options) = $this->_request(
            'get',
            $this->related_object->url,
            [],
            ['stripe_account' => $this->context],
            [],
            'v2'
        );

        return \Stripe\Util\Util::convertToStripeObject($object, $options, 'v2');
    }
}
