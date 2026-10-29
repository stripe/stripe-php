<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A Transaction records how a money movement flow affects your FinancialAccount balance.
 * A flow can create one or more Transactions.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount of the Transaction.
 * @property (object{available: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\Stripe\StripeObject) $balance_impact The change to the FinancialAccount's balance. This is the sum of the balance impacts of this Transaction's TransactionEntries with <code>effective_at</code> timestamps in the past.
 * @property string $category Open Enum. A category used to classify the Transaction.
 * @property null|(object{name?: string}&\Stripe\StripeObject) $counterparty Details about the counterparty to this Transaction.
 * @property string $created Time at which the object was created. Represented as an RFC 3339 timestamp in UTC with millisecond precision, for example <code>2022-09-18T13:22:18.123Z</code>.
 * @property null|string $description A description of the Transaction. When applicable, the description is copied from the flow object when the Transaction is created. You can update it using the Update Transaction endpoint.
 * @property string $financial_account The ID of the FinancialAccount affected by this Transaction.
 * @property null|(object{adjustment?: string, currency_conversion?: string, fee_batch?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, received_credit?: string, received_debit?: string, type: string}&\Stripe\StripeObject) $flow Details about the flow object that created the Transaction, such as an InboundTransfer or OutboundPayment. <code>flow.type</code> identifies the kind of object. The corresponding field contains its ID, when available: for an InboundTransfer, <code>flow.inbound_transfer</code> contains the InboundTransfer's ID. Pass that ID to the <code>flow</code> parameter on List Transactions.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property (object{status: string, url?: string, url_expires_at?: string}&\Stripe\StripeObject) $regulatory_receipt Hosted transaction receipt that is provided when money movement is considered regulated under Stripe's money transmission licenses. If not applicable, <code>regulatory_receipt.status</code> will be <code>not_applicable</code> and no URL will be provided unless you opt in by calling <code>/refresh_regulatory_receipt</code>.
 * @property string $status Closed Enum. The current status of the Transaction. A Transaction is <code>pending</code> if either <code>balance_impact.inbound_pending</code> or <code>balance_impact.outbound_pending</code> is non-zero. A Transaction is <code>posted</code> if only <code>balance_impact.available</code> is non-zero. A Transaction is <code>void</code> if there is no balance impact. <code>posted</code> and <code>void</code> are terminal states, and no additional TransactionEntries will be added to the Transaction.
 * @property (object{posted_at?: string, void_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps for when the Transaction transitioned to each status.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction';

    const CATEGORY_ADJUSTMENT = 'adjustment';
    const CATEGORY_CURRENCY_CONVERSION = 'currency_conversion';
    const CATEGORY_INBOUND_TRANSFER = 'inbound_transfer';
    const CATEGORY_INBOUND_TRANSFER_REVERSAL = 'inbound_transfer_reversal';
    const CATEGORY_OUTBOUND_PAYMENT = 'outbound_payment';
    const CATEGORY_OUTBOUND_PAYMENT_REVERSAL = 'outbound_payment_reversal';
    const CATEGORY_OUTBOUND_TRANSFER = 'outbound_transfer';
    const CATEGORY_OUTBOUND_TRANSFER_REVERSAL = 'outbound_transfer_reversal';
    const CATEGORY_RECEIVED_CREDIT = 'received_credit';
    const CATEGORY_RECEIVED_CREDIT_REVERSAL = 'received_credit_reversal';
    const CATEGORY_RECEIVED_DEBIT = 'received_debit';
    const CATEGORY_RECEIVED_DEBIT_REVERSAL = 'received_debit_reversal';
    const CATEGORY_STRIPE_FEE = 'stripe_fee';
    const CATEGORY_STRIPE_FEE_TAX = 'stripe_fee_tax';

    const STATUS_PENDING = 'pending';
    const STATUS_POSTED = 'posted';
    const STATUS_VOID = 'void';
}
