<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * Use Transactions to view changes to your FinancialAccount balance over time. Every flow that moves money, such as OutboundPayments or ReceivedCredits, will have one or more Transactions that describes how the flow impacted your balance. Note that while the FinancialAccount balance will always be up to date, be aware that Transactions and TransactionEntries are created shortly after to reflect changes.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value: int, currency: string}&\Stripe\StripeObject) $amount The amount of the Transaction.
 * @property (object{available: (object{value: int, currency: string}&\Stripe\StripeObject), inbound_pending: (object{value: int, currency: string}&\Stripe\StripeObject), outbound_pending: (object{value: int, currency: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $balance_impact The delta to the FinancialAccount's balance. The balance_impact for the Transaction is equal to sum of its TransactionEntries that have <code>effective_at</code>s in the past.
 * @property string $category Open Enum. A descriptive category used to classify the Transaction.
 * @property int $created Time at which the object was created. Represented as a RFC 3339 date &amp; time UTC value in millisecond precision, for example: 2022-09-18T13:22:18.123Z.
 * @property string $financial_account Indicates the FinancialAccount affected by this Transaction.
 * @property (object{type: string, adjustment?: string, application_fee?: string, application_fee_refund?: string, charge?: string, currency_conversion?: string, dispute?: string, fee_transaction?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, payout?: string, received_credit?: string, received_debit?: string, refund?: string, reserve_hold?: string, reserve_release?: string, topup?: string, transfer?: string, transfer_reversal?: string}&\Stripe\StripeObject) $flow Details about the Flow object that created the Transaction.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $status Closed Enum. Current status of the Transaction. A Transaction is <code>pending</code> if either <code>balance_impact.inbound_pending</code> or <code>balance_impact.outbound_pending</code> is non-zero. A Transaction is <code>posted</code> if only <code>balance_impact.available</code> is non-zero. A Transaction is <code>void</code> if there is no balance impact. <code>posted</code> and <code>void</code> are terminal states, and no additional entries will be added to the Transaction.
 * @property (object{posted_at?: int, void_at?: int}&\Stripe\StripeObject) $status_transitions Timestamps for when the Transaction transitioned to a particular status.
 */
class Transaction extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction';

    const CATEGORY_ADJUSTMENT = 'adjustment';
    const CATEGORY_ADVANCE = 'advance';
    const CATEGORY_ANTICIPATION_REPAYMENT = 'anticipation_repayment';
    const CATEGORY_BALANCE_TRANSFER = 'balance_transfer';
    const CATEGORY_CHARGE = 'charge';
    const CATEGORY_CHARGE_FAILURE = 'charge_failure';
    const CATEGORY_CLIMATE_ORDER_PURCHASE = 'climate_order_purchase';
    const CATEGORY_CLIMATE_ORDER_REFUND = 'climate_order_refund';
    const CATEGORY_CONNECT_COLLECTION_TRANSFER = 'connect_collection_transfer';
    const CATEGORY_CONNECT_RESERVED_FUNDS = 'connect_reserved_funds';
    const CATEGORY_CONTRIBUTION = 'contribution';
    const CATEGORY_CURRENCY_CONVERSION = 'currency_conversion';
    const CATEGORY_DISPUTE_REVERSAL = 'dispute_reversal';
    const CATEGORY_FINANCING_PAYDOWN = 'financing_paydown';
    const CATEGORY_FINANCING_PAYDOWN_REVERSAL = 'financing_paydown_reversal';
    const CATEGORY_INBOUND_TRANSFER = 'inbound_transfer';
    const CATEGORY_INBOUND_TRANSFER_REVERSAL = 'inbound_transfer_reversal';
    const CATEGORY_ISSUING_DISPUTE = 'issuing_dispute';
    const CATEGORY_ISSUING_DISPUTE_FRAUD_LIABILITY_DEBIT = 'issuing_dispute_fraud_liability_debit';
    const CATEGORY_ISSUING_DISPUTE_PROVISIONAL_CREDIT = 'issuing_dispute_provisional_credit';
    const CATEGORY_ISSUING_DISPUTE_PROVISIONAL_CREDIT_REVERSAL = 'issuing_dispute_provisional_credit_reversal';
    const CATEGORY_MINIMUM_BALANCE_HOLD = 'minimum_balance_hold';
    const CATEGORY_NETWORK_COST = 'network_cost';
    const CATEGORY_OBLIGATION = 'obligation';
    const CATEGORY_OUTBOUND_PAYMENT = 'outbound_payment';
    const CATEGORY_OUTBOUND_PAYMENT_REVERSAL = 'outbound_payment_reversal';
    const CATEGORY_OUTBOUND_TRANSFER = 'outbound_transfer';
    const CATEGORY_OUTBOUND_TRANSFER_REVERSAL = 'outbound_transfer_reversal';
    const CATEGORY_PARTIAL_CAPTURE_REVERSAL = 'partial_capture_reversal';
    const CATEGORY_PAYMENT_NETWORK_RESERVED_FUNDS = 'payment_network_reserved_funds';
    const CATEGORY_PLATFORM_EARNING = 'platform_earning';
    const CATEGORY_PLATFORM_EARNING_REFUND = 'platform_earning_refund';
    const CATEGORY_PLATFORM_FEE = 'platform_fee';
    const CATEGORY_RECEIVED_CREDIT = 'received_credit';
    const CATEGORY_RECEIVED_CREDIT_REVERSAL = 'received_credit_reversal';
    const CATEGORY_RECEIVED_DEBIT = 'received_debit';
    const CATEGORY_RECEIVED_DEBIT_REVERSAL = 'received_debit_reversal';
    const CATEGORY_REFUND_FAILURE = 'refund_failure';
    const CATEGORY_RETURN = 'return';
    const CATEGORY_RISK_RESERVED_FUNDS = 'risk_reserved_funds';
    const CATEGORY_STRIPE_BALANCE_PAYMENT_DEBIT = 'stripe_balance_payment_debit';
    const CATEGORY_STRIPE_BALANCE_PAYMENT_DEBIT_REVERSAL = 'stripe_balance_payment_debit_reversal';
    const CATEGORY_STRIPE_FEE = 'stripe_fee';
    const CATEGORY_STRIPE_FEE_TAX = 'stripe_fee_tax';
    const CATEGORY_TRANSFER_REVERSAL = 'transfer_reversal';
    const CATEGORY_UNRECONCILED_CUSTOMER_FUNDS = 'unreconciled_customer_funds';

    const STATUS_PENDING = 'pending';
    const STATUS_POSTED = 'posted';
    const STATUS_VOID = 'void';
}
