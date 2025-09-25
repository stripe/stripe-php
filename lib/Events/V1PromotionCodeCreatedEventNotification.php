<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V1PromotionCodeCreatedEventNotification extends \Stripe\V2\EventNotification
{
    const LOOKUP_TYPE = 'v1.promotion_code.created';
    public $related_object;

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V1PromotionCodeCreatedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Stripe\PromotionCode
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        return parent::fetchRelatedObject();
    }
}
