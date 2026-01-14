<?php

namespace Stripe\Util;

class EventTypes
{
    const v2EventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::class,
        \Stripe\Events\V1BillingMeterNoMeterFoundEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterNoMeterFoundEvent::class,
        \Stripe\Events\V2CoreAccountClosedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountClosedEvent::class,
        \Stripe\Events\V2CoreAccountCreatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountCreatedEvent::class,
        \Stripe\Events\V2CoreAccountUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEvent::class,
        \Stripe\Events\V2CoreAccountLinkReturnedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountLinkReturnedEvent::class,
        \Stripe\Events\V2CoreAccountPersonCreatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountPersonCreatedEvent::class,
        \Stripe\Events\V2CoreAccountPersonDeletedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountPersonDeletedEvent::class,
        \Stripe\Events\V2CoreAccountPersonUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountPersonUpdatedEvent::class,
        \Stripe\Events\V2CoreEventDestinationPingEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreEventDestinationPingEvent::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
