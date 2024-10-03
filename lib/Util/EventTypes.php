<?php

namespace Stripe\Util;

class EventTypes
{
    const thinEventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::class,
        \Stripe\Events\V1BillingMeterNoMeterFoundEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterNoMeterFoundEvent::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
