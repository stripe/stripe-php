<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2PaymentsSettlementAllocationIntentNotFoundEventData $data data associated with the event
 */
class V2PaymentsSettlementAllocationIntentNotFoundEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.payments.settlement_allocation_intent.not_found';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2PaymentsSettlementAllocationIntentNotFoundEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
