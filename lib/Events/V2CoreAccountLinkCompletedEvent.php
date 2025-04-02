<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreAccountLinkCompletedEventData $data data associated with the event
 */
class V2CoreAccountLinkCompletedEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v2.core.account_link.completed';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreAccountLinkCompletedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
