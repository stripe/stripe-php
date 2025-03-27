<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Use Transactions to view changes to your FinancialAccount balance over time. Every flow that moves money, such as OutboundPayments or ReceivedCredits, will have one or more Transactions that describes how the flow impacted your balance. Note that while the FinancialAccount balance will always be up to date, be aware that Transactions and TransactionEntries are created shortly after to reflect changes.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount of the Transaction.
 * @property (object{available: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\stdClass&\Stripe\StripeObject) $balance_impact The delta to the FinancialAccount's balance. The balance_impact for the Transaction is equal to sum of its TransactionEntries that have <code>effective_at</code>s in the past.
 * @property string $category Open Enum. A descriptive category used to classify the Transaction.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property string $financial_account Indicates the FinancialAccount affected by this Transaction.
 * @property (object{type: string, adjustment: null|string, fee_transaction: null|string, inbound_transfer: null|string, outbound_payment: null|string, outbound_transfer: null|string, received_credit: null|string, received_debit: null|string}&\stdClass&\Stripe\StripeObject) $flow Details about the Flow object that created the Transaction.
 * @property string $status Closed Enum. Current status of the Transaction. A Transaction is <code>pending</code> if either <code>balance_impact.inbound_pending</code> or <code>balance_impact.outbound_pending</code> is non-zero. A Transaction is <code>posted</code> if only <code>balance_impact.available</code> is non-zero. A Transaction is <code>void</code> if there is no balance impact. <code>posted</code> and <code>void</code> are terminal states, and no additional entries will be added to the Transaction.
 * @property (object{posted_at: null|int, void_at: null|int}&\stdClass&\Stripe\StripeObject) $status_transitions Timestamps for when the Transaction transitioned to a particular status.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction';

    const CATEGORY_ADJUSTMENT = 'adjustment';
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
