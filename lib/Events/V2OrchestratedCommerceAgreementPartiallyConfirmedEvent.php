<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 * @property \Stripe\EventData\V2OrchestratedCommerceAgreementPartiallyConfirmedEventData $data data associated with the event
 */
class V2OrchestratedCommerceAgreementPartiallyConfirmedEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.orchestrated_commerce.agreement.partially_confirmed';

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Stripe\V2\OrchestratedCommerce\Agreement
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

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2OrchestratedCommerceAgreementPartiallyConfirmedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
