<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V1AccountSignalsIncludingDelinquencyCreatedEventData $data data associated with the event
 */
class V1AccountSignalsIncludingDelinquencyCreatedEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v1.account_signals[delinquency].created';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V1AccountSignalsIncludingDelinquencyCreatedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
