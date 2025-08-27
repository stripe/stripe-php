<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreHealthAuthorizationRateDropResolvedEventData $data data associated with the event
 */
class V2CoreHealthAuthorizationRateDropResolvedEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v2.core.health.authorization_rate_drop.resolved';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreHealthAuthorizationRateDropResolvedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
