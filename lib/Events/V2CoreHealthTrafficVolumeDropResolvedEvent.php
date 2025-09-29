<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreHealthTrafficVolumeDropResolvedEventData $data data associated with the event
 */
class V2CoreHealthTrafficVolumeDropResolvedEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.core.health.traffic_volume_drop.resolved';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreHealthTrafficVolumeDropResolvedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
