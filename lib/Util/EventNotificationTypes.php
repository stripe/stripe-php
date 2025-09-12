<?php

namespace Stripe\Util;

class EventNotificationTypes
{
    const v2EventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification::class,
        \Stripe\Events\V1BillingMeterNoMeterFoundEventNotification::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterNoMeterFoundEventNotification::class,
        \Stripe\Events\V2CoreEventDestinationPingEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreEventDestinationPingEventNotification::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
