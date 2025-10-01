<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2CoreHealthIssuingAuthorizationRequestErrorsFiringEventData $data data associated with the event
 */
class V2CoreHealthIssuingAuthorizationRequestErrorsFiringEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.core.health.issuing_authorization_request_errors.firing';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2CoreHealthIssuingAuthorizationRequestErrorsFiringEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
