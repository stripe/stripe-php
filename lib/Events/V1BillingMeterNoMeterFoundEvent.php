<?php

// File generated from our OpenAPI spec

namespace Stripe\Events;

class V1BillingMeterNoMeterFoundEvent extends \Stripe\V2\Event
{
    const LOOKUP_TYPE = 'v1.billing.meter.no_meter_found';

    /**
     * @var \Stripe\EventData\V1BillingMeterNoMeterFoundEventData data associated with the event
     */
    public $data;
}
