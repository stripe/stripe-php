<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V2SignalsAccountSignalFraudulentMerchantReadyEventNotification extends \Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.signals.account_signal.fraudulent_merchant_ready';

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2SignalsAccountSignalFraudulentMerchantReadyEvent
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }
}
