<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreHealthFraudRateIncreasedEventData $data data associated with the event
 */
class V2CoreHealthFraudRateIncreasedEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v2.core.health.fraud_rate.increased';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreHealthFraudRateIncreasedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
