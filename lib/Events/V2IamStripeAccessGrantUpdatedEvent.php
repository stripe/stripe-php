<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2IamStripeAccessGrantUpdatedEventData $data data associated with the event
 */
class V2IamStripeAccessGrantUpdatedEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.iam.stripe_access_grant.updated';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2IamStripeAccessGrantUpdatedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
