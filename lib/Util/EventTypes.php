<?php

namespace Stripe\Util;

class EventTypes
{
    const thinEventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::class,
        \Stripe\Events\V1BillingMeterNoMeterFoundEvent::LOOKUP_TYPE => \Stripe\Events\V1BillingMeterNoMeterFoundEvent::class,
        \Stripe\Events\V2MoneyManagementFinancialAccountCreatedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementFinancialAccountCreatedEvent::class,
        \Stripe\Events\V2MoneyManagementFinancialAddressActivatedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementFinancialAddressActivatedEvent::class,
        \Stripe\Events\V2MoneyManagementFinancialAddressFailedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementFinancialAddressFailedEvent::class,
        \Stripe\Events\V2MoneyManagementInboundTransferAvailableEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementInboundTransferAvailableEvent::class,
        \Stripe\Events\V2MoneyManagementInboundTransferBankDebitFailedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementInboundTransferBankDebitFailedEvent::class,
        \Stripe\Events\V2MoneyManagementInboundTransferBankDebitProcessingEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementInboundTransferBankDebitProcessingEvent::class,
        \Stripe\Events\V2MoneyManagementInboundTransferBankDebitQueuedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementInboundTransferBankDebitQueuedEvent::class,
        \Stripe\Events\V2MoneyManagementInboundTransferBankDebitReturnedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementInboundTransferBankDebitReturnedEvent::class,
        \Stripe\Events\V2MoneyManagementInboundTransferBankDebitSucceededEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementInboundTransferBankDebitSucceededEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundPaymentCanceledEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundPaymentCanceledEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundPaymentCreatedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundPaymentCreatedEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundPaymentFailedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundPaymentFailedEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundPaymentPostedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundPaymentPostedEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundPaymentReturnedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundPaymentReturnedEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundTransferCanceledEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundTransferCanceledEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundTransferCreatedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundTransferCreatedEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundTransferFailedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundTransferFailedEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundTransferPostedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundTransferPostedEvent::class,
        \Stripe\Events\V2MoneyManagementOutboundTransferReturnedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementOutboundTransferReturnedEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedCreditAvailableEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedCreditAvailableEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedCreditFailedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedCreditFailedEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedCreditReturnedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedCreditReturnedEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedCreditSucceededEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedCreditSucceededEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedDebitCanceledEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedDebitCanceledEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedDebitFailedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedDebitFailedEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedDebitPendingEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedDebitPendingEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedDebitSucceededEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedDebitSucceededEvent::class,
        \Stripe\Events\V2MoneyManagementReceivedDebitUpdatedEvent::LOOKUP_TYPE => \Stripe\Events\V2MoneyManagementReceivedDebitUpdatedEvent::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
