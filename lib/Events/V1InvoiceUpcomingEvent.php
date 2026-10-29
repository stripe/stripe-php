<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V1InvoiceUpcomingEventData $data data associated with the event
 */
class V1InvoiceUpcomingEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v1.invoice.upcoming';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V1InvoiceUpcomingEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
