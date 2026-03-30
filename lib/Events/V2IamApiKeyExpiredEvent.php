<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2IamApiKeyExpiredEventData $data data associated with the event
 */
class V2IamApiKeyExpiredEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.iam.api_key.expired';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2IamApiKeyExpiredEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
