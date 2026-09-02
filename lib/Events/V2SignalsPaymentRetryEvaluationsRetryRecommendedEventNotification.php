<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2SignalsPaymentRetryEvaluationsRetryRecommendedEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.signals.payment_retry_evaluations.retry_recommended';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2SignalsPaymentRetryEvaluationsRetryRecommendedEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
