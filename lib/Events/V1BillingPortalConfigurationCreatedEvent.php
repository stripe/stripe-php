<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V1BillingPortalConfigurationCreatedEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v1.billing_portal.configuration.created';

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Stripe\BillingPortal\Configuration
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        $apiMode = \Stripe\Util\Util::getApiMode($this->related_object->url);
        list($object, $options) = $this->_request(
            'get',
            $this->related_object->url,
            [],
            ['stripe_account' => $this->context],
            [],
            $apiMode
        );

        return \Stripe\Util\Util::convertToStripeObject($object, $options, $apiMode);
    }
}
