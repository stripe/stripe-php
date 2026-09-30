<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V1BillingAlertTriggeredEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v1.billing.alert.triggered';

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Stripe\Billing\Alert
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        $apiMode = \Stripe\Util\Util::getApiMode($this->related_object->url);
        list($object, $options) = $this->_request('get', $this->related_object->url, [], [
            'stripe_context' => $this->context,
            'headers' => ['Stripe-Request-Trigger' => 'event=' . $this->id],
        ], [], $apiMode);

        return \Stripe\Util\Util::convertToStripeObject($object, $options, $apiMode);
    }
}
