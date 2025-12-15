<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Use Transactions to view changes to your FinancialAccount balance over time. Every flow that moves money, such as OutboundPayments or ReceivedCredits, will have one or more Transactions that describes how the flow impacted your balance. Note that while the FinancialAccount balance will always be up to date, be aware that Transactions and TransactionEntries are created shortly after to reflect changes.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount The amount of the Transaction.
 * @property (object{available: (object{value?: int, currency?: string}&\Stripe\StripeObject), inbound_pending: (object{value?: int, currency?: string}&\Stripe\StripeObject), outbound_pending: (object{value?: int, currency?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $balance_impact The delta to the FinancialAccount's balance. The balance_impact for the Transaction is equal to sum of its TransactionEntries that have <code>effective_at</code>s in the past.
 * @property string $category Open Enum. A descriptive category used to classify the Transaction.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property string $financial_account Indicates the FinancialAccount affected by this Transaction.
 * @property (object{type: string, adjustment?: string, currency_conversion?: string, fee_transaction?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, received_credit?: string, received_debit?: string}&\Stripe\StripeObject) $flow Details about the Flow object that created the Transaction.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Closed Enum. Current status of the Transaction. A Transaction is <code>pending</code> if either <code>balance_impact.inbound_pending</code> or <code>balance_impact.outbound_pending</code> is non-zero. A Transaction is <code>posted</code> if only <code>balance_impact.available</code> is non-zero. A Transaction is <code>void</code> if there is no balance impact. <code>posted</code> and <code>void</code> are terminal states, and no additional entries will be added to the Transaction.
 * @property (object{posted_at?: int, void_at?: int}&\Stripe\StripeObject) $status_transitions Timestamps for when the Transaction transitioned to a particular status.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction';

    const CATEGORY_ADJUSTMENT = 'adjustment';
    const CATEGORY_CURRENCY_CONVERSION = 'currency_conversion';
    const CATEGORY_INBOUND_TRANSFER = 'inbound_transfer';
    const CATEGORY_OUTBOUND_PAYMENT = 'outbound_payment';
    const CATEGORY_OUTBOUND_TRANSFER = 'outbound_transfer';
    const CATEGORY_RECEIVED_CREDIT = 'received_credit';
    const CATEGORY_RECEIVED_DEBIT = 'received_debit';
    const CATEGORY_RETURN = 'return';
    const CATEGORY_STRIPE_FEE = 'stripe_fee';

    const STATUS_PENDING = 'pending';
    const STATUS_POSTED = 'posted';
    const STATUS_VOID = 'void';
}
