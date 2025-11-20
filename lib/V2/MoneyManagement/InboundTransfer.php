<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * An InboundTransfer object, representing a money movement from a
 * user owned PaymentMethod to a FinancialAccount belonging to the same user.
 *
 * @property string $id Unique identifier for the InboundTransfer.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount The amount in specified currency that will land in the FinancialAccount balance.
 * @property int $created Creation time of the InboundTransfer. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property string $description A freeform text field provided by user, containing metadata.
 * @property (object{debited: (object{value?: int, currency?: string}&\Stripe\StripeObject), payment_method: (object{type: string, us_bank_account?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $from A nested object containing information about the origin of the InboundTransfer.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $receipt_url A hosted transaction receipt URL that is provided when money movement is considered regulated under Stripe’s money transmission licenses.
 * @property (object{credited: (object{value?: int, currency?: string}&\Stripe\StripeObject), financial_account: string}&\Stripe\StripeObject) $to A nested object containing information about the destination of the InboundTransfer.
 * @property (object{created: int, effective_at: int, id: string, level: string, type: string, bank_debit_failed?: (object{failure_reason: string}&\Stripe\StripeObject), bank_debit_processing?: \Stripe\StripeObject, bank_debit_queued?: \Stripe\StripeObject, bank_debit_returned?: (object{return_reason: string}&\Stripe\StripeObject), bank_debit_succeeded?: \Stripe\StripeObject}&\Stripe\StripeObject)[] $transfer_history A list of history objects, representing changes in the state of the InboundTransfer.
 */
class InboundTransfer extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.inbound_transfer';
}
