<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreHealthInvoiceCountDroppedResolvedEventData $data data associated with the event
 */
class V2CoreHealthInvoiceCountDroppedResolvedEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.core.health.invoice_count_dropped.resolved';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreHealthInvoiceCountDroppedResolvedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
