<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventData $data data associated with the event
 */
class V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v2.core.account[configuration.customer].capability_status_updated';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
