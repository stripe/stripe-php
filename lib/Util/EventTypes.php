<?php

namespace Stripe\Util;

class EventTypes
{
    const v2EventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::class,
        \Stripe\Events\V1BillingMeterNoMeterFoundEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterNoMeterFoundEvent::class,
        \Stripe\Events\V2CoreEventDestinationPingEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreEventDestinationPingEvent::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
