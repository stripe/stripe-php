<?php

namespace Stripe\Util;

class EventTypes
{
    const thinEventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\V2\Event\AccountConfigurationRecipientDataAccountLinkCompletedEvent::LOOKUP_TYPE => \Stripe\V2\Event\AccountConfigurationRecipientDataAccountLinkCompletedEvent::class,
        \Stripe\V2\Event\AccountConfigurationRecipientDataFeatureStatusUpdatedEvent::LOOKUP_TYPE => \Stripe\V2\Event\AccountConfigurationRecipientDataFeatureStatusUpdatedEvent::class,
        \Stripe\V2\Event\AccountRequirementsUpdatedEvent::LOOKUP_TYPE => \Stripe\V2\Event\AccountRequirementsUpdatedEvent::class,
        \Stripe\V2\Event\FinancialAccountBalanceOpenedEvent::LOOKUP_TYPE => \Stripe\V2\Event\FinancialAccountBalanceOpenedEvent::class,
        \Stripe\V2\Event\FinancialAccountCreatedEvent::LOOKUP_TYPE => \Stripe\V2\Event\FinancialAccountCreatedEvent::class,
        \Stripe\V2\Event\FinancialAddressActivatedEvent::LOOKUP_TYPE => \Stripe\V2\Event\FinancialAddressActivatedEvent::class,
        \Stripe\V2\Event\FinancialAddressFailedEvent::LOOKUP_TYPE => \Stripe\V2\Event\FinancialAddressFailedEvent::class,
        \Stripe\V2\Event\InboundTransferBankDebitSucceededEvent::LOOKUP_TYPE => \Stripe\V2\Event\InboundTransferBankDebitSucceededEvent::class,
        \Stripe\V2\Event\EventDestinationPingEvent::LOOKUP_TYPE => \Stripe\V2\Event\EventDestinationPingEvent::class,
        \Stripe\V2\Event\OutboundPaymentCanceledEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundPaymentCanceledEvent::class,
        \Stripe\V2\Event\OutboundPaymentCreatedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundPaymentCreatedEvent::class,
        \Stripe\V2\Event\OutboundPaymentFailedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundPaymentFailedEvent::class,
        \Stripe\V2\Event\OutboundPaymentPostedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundPaymentPostedEvent::class,
        \Stripe\V2\Event\OutboundPaymentReturnedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundPaymentReturnedEvent::class,
        \Stripe\V2\Event\OutboundTransferCanceledEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundTransferCanceledEvent::class,
        \Stripe\V2\Event\OutboundTransferCreatedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundTransferCreatedEvent::class,
        \Stripe\V2\Event\OutboundTransferFailedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundTransferFailedEvent::class,
        \Stripe\V2\Event\OutboundTransferPostedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundTransferPostedEvent::class,
        \Stripe\V2\Event\OutboundTransferReturnedEvent::LOOKUP_TYPE => \Stripe\V2\Event\OutboundTransferReturnedEvent::class,
        \Stripe\V2\Event\ReceivedCreditAvailableEvent::LOOKUP_TYPE => \Stripe\V2\Event\ReceivedCreditAvailableEvent::class,
        \Stripe\V2\Event\ReceivedCreditFailedEvent::LOOKUP_TYPE => \Stripe\V2\Event\ReceivedCreditFailedEvent::class,
        \Stripe\V2\Event\ReceivedCreditReturnedEvent::LOOKUP_TYPE => \Stripe\V2\Event\ReceivedCreditReturnedEvent::class,
        \Stripe\V2\Event\ReceivedCreditSucceededEvent::LOOKUP_TYPE => \Stripe\V2\Event\ReceivedCreditSucceededEvent::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
