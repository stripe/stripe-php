<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * ReceivedDebit resource.
 *
 * @property string $id Unique identifier for the ReceivedDebit.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount Amount and currency of the ReceivedDebit.
 * @property null|(object{type: string, topup?: string}&\Stripe\StripeObject) $balance_transfer This object stores details about the balance transfer object that resulted in the ReceivedDebit.
 * @property null|(object{financial_address: string, origin_type: string, payment_method_type: string, statement_descriptor?: string, us_bank_account: (object{bank_name?: string, network: string, routing_number?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $bank_transfer This object stores details about the originating banking transaction that resulted in the ReceivedDebit. Present if <code>type</code> field value is <code>bank_transfer</code>.
 * @property int $created The time at which the ReceivedDebit was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: <code>2022-09-18T13:22:18.123Z</code>.
 * @property null|string $description Freeform string sent by the originator of the ReceivedDebit.
 * @property null|(object{value?: int, currency?: string}&\Stripe\StripeObject) $external_amount The amount and currency of the original/external debit request.
 * @property string $financial_account Financial Account on which funds for ReceivedDebit were debited.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|string $receipt_url A link to the Stripe-hosted receipt for this ReceivedDebit.
 * @property string $status Open Enum. The status of the ReceivedDebit.
 * @property null|(object{failed: (object{reason: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Detailed information about the status of the ReceivedDebit.
 * @property null|(object{canceled_at?: int, failed_at?: int, succeeded_at?: int}&\Stripe\StripeObject) $status_transitions The time at which the ReceivedDebit transitioned to a particular status.
 * @property null|(object{debit_agreement?: string, statement_descriptor?: string}&\Stripe\StripeObject) $stripe_balance_payment This object stores details about the Stripe Balance Payment that resulted in the ReceivedDebit.
 * @property string $type Open enum, the type of the received debit.
 */
class ReceivedDebit extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.received_debit';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_RETURNED = 'returned';
    const STATUS_SUCCEEDED = 'succeeded';

    const TYPE_BALANCE_TRANSFER = 'balance_transfer';
    const TYPE_BANK_TRANSFER = 'bank_transfer';
    const TYPE_EXTERNAL_DEBIT = 'external_debit';
    const TYPE_STRIPE_BALANCE_PAYMENT = 'stripe_balance_payment';
}
