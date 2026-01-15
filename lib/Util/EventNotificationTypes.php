<?php

namespace Stripe\Util;

class EventNotificationTypes
{
    const v2EventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification::class,
        \Stripe\Events\V1BillingMeterNoMeterFoundEventNotification::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterNoMeterFoundEventNotification::class,
        \Stripe\Events\V2CoreAccountClosedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountClosedEventNotification::class,
        \Stripe\Events\V2CoreAccountCreatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountCreatedEventNotification::class,
        \Stripe\Events\V2CoreAccountUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEventNotification::class,
        \Stripe\Events\V2CoreAccountLinkReturnedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountLinkReturnedEventNotification::class,
        \Stripe\Events\V2CoreAccountPersonCreatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountPersonCreatedEventNotification::class,
        \Stripe\Events\V2CoreAccountPersonDeletedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountPersonDeletedEventNotification::class,
        \Stripe\Events\V2CoreAccountPersonUpdatedEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreAccountPersonUpdatedEventNotification::class,
        \Stripe\Events\V2CoreEventDestinationPingEventNotification::LOOKUP_TYPE => \Stripe\Events\V2CoreEventDestinationPingEventNotification::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
