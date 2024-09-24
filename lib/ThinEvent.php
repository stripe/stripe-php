<?php

namespace Stripe;

use Stripe\Util\Util;

/**
 * @property string $id Unique identifier for the event.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property int $created Time at which the object was created.
 * @property \Stripe\StripeObject $reason Reason for the event.
 * @property \Stripe\StripeObject $related_object Object containing the reference to API resource relevant to the event.
 * @property string $type The type of the event.
 */
abstract class ThinEvent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'event';

    /**
     * Fetches the object related to the event from Stripe.
     * This fetches the latest state of the object to avoid issues like race conditions.
     *
     * @throws \Stripe\Exception\ApiErrorException
     *
     * @return null|array|StripeObject
     */
    public function fetchObject()
    {
        // @phpstan-ignore-next-line
        if (null === $this->related_object || null === $this->related_object->url) {
            return null;
        }
        list($object, $options) = $this->_request(
            'get',
            // @phpstan-ignore-next-line
            $this->related_object->url,
            [],
            null,
            [],
            'v2'
        );

        return Util::convertToStripeObject($object, $options, 'v2');
    }

    /**
     * Utility method to fetch event data from Stripe and convert it into a typed notification event.
     *
     * @param mixed $class
     *
     * @throws \Stripe\Exception\ApiErrorException
     *
     * @return StripeObject
     */
    protected function fetchDataAndDeserialize($class)
    {
        list($fullEvent, $options) = $this->_request(
            'get',
            '/v2/events/' . $this->id,
            [],
            null,
            [],
            'v2'
        );

        return $class::constructFrom($fullEvent['data'], $options, 'v2');
    }
}
