<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreHealthMeterEventSummariesDelayedFiringEventData $data data associated with the event
 */
class V2CoreHealthMeterEventSummariesDelayedFiringEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.core.health.meter_event_summaries_delayed.firing';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreHealthMeterEventSummariesDelayedFiringEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
