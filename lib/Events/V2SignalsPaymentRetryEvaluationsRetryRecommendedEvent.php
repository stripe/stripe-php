<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

/**
 * @property \Stripe\EventData\V2SignalsPaymentRetryEvaluationsRetryRecommendedEventData $data data associated with the event
 */
class V2SignalsPaymentRetryEvaluationsRetryRecommendedEvent extends \Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.signals.payment_retry_evaluations.retry_recommended';

    public static function constructFrom($values, $opts = null, $apiMode = 'v2')
    {
        $evt = parent::constructFrom($values, $opts, $apiMode);
        if (null !== $evt->data) {
            $evt->data = \Stripe\EventData\V2SignalsPaymentRetryEvaluationsRetryRecommendedEventData::constructFrom($evt->data, $opts, $apiMode);
        }

        return $evt;
    }
}
