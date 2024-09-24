<?php

namespace Stripe\Util;

class EventTypes
{
    const thinEventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::class,
        \Stripe\Events\V1BillingMeterNoMeterFoundEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterNoMeterFoundEvent::class,
        \Stripe\Events\AccountConfigurationRecipientDataAccountLinkCompletedEvent::LOOKUP_TYPE => \Stripe\Events\AccountConfigurationRecipientDataAccountLinkCompletedEvent::class,
        \Stripe\Events\AccountConfigurationRecipientDataFeatureStatusUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\AccountConfigurationRecipientDataFeatureStatusUpdatedEvent::class,
        \Stripe\Events\AccountRequirementsUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\AccountRequirementsUpdatedEvent::class,
        \Stripe\Events\FinancialAccountBalanceOpenedEvent::LOOKUP_TYPE => \Stripe\Events\FinancialAccountBalanceOpenedEvent::class,
        \Stripe\Events\FinancialAccountCreatedEvent::LOOKUP_TYPE => \Stripe\Events\FinancialAccountCreatedEvent::class,
        \Stripe\Events\FinancialAddressActivatedEvent::LOOKUP_TYPE => \Stripe\Events\FinancialAddressActivatedEvent::class,
        \Stripe\Events\FinancialAddressFailedEvent::LOOKUP_TYPE => \Stripe\Events\FinancialAddressFailedEvent::class,
        \Stripe\Events\InboundTransferBankDebitSucceededEvent::LOOKUP_TYPE => \Stripe\Events\InboundTransferBankDebitSucceededEvent::class,
        \Stripe\Events\V2CoreEventDestinationPingEvent::LOOKUP_TYPE => \Stripe\Events\V2CoreEventDestinationPingEvent::class,
        \Stripe\Events\OutboundPaymentCanceledEvent::LOOKUP_TYPE => \Stripe\Events\OutboundPaymentCanceledEvent::class,
        \Stripe\Events\OutboundPaymentCreatedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundPaymentCreatedEvent::class,
        \Stripe\Events\OutboundPaymentFailedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundPaymentFailedEvent::class,
        \Stripe\Events\OutboundPaymentPostedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundPaymentPostedEvent::class,
        \Stripe\Events\OutboundPaymentReturnedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundPaymentReturnedEvent::class,
        \Stripe\Events\OutboundTransferCanceledEvent::LOOKUP_TYPE => \Stripe\Events\OutboundTransferCanceledEvent::class,
        \Stripe\Events\OutboundTransferCreatedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundTransferCreatedEvent::class,
        \Stripe\Events\OutboundTransferFailedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundTransferFailedEvent::class,
        \Stripe\Events\OutboundTransferPostedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundTransferPostedEvent::class,
        \Stripe\Events\OutboundTransferReturnedEvent::LOOKUP_TYPE => \Stripe\Events\OutboundTransferReturnedEvent::class,
        \Stripe\Events\ReceivedCreditAvailableEvent::LOOKUP_TYPE => \Stripe\Events\ReceivedCreditAvailableEvent::class,
        \Stripe\Events\ReceivedCreditFailedEvent::LOOKUP_TYPE => \Stripe\Events\ReceivedCreditFailedEvent::class,
        \Stripe\Events\ReceivedCreditReturnedEvent::LOOKUP_TYPE => \Stripe\Events\ReceivedCreditReturnedEvent::class,
        \Stripe\Events\ReceivedCreditSucceededEvent::LOOKUP_TYPE => \Stripe\Events\ReceivedCreditSucceededEvent::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
