<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventData $data data associated with the event
 */
class V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v2.core.account[configuration.merchant].capability_status_updated';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
