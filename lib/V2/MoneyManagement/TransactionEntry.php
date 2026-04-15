<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * TransactionEntries represent individual money movements across different states within a Transaction.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{available: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\Stripe\StripeObject) $balance_impact The delta to the FinancialAccount's balance.
 * @property int $created Time at which the object was created.
 * @property int $effective_at Time at which the entry impacted (or will impact if it's in the future) the FinancialAccount balance.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $transaction The Transaction that this TransactionEntry belongs to.
 * @property (object{category: string, financial_account: string, flow?: (object{adjustment?: string, application_fee?: string, application_fee_refund?: string, charge?: string, currency_conversion?: string, dispute?: string, fee_transaction?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, payout?: string, received_credit?: string, received_debit?: string, refund?: string, reserve_hold?: string, reserve_release?: string, topup?: string, transfer?: string, transfer_reversal?: string, treasury_credit_reversal?: string, treasury_debit_reversal?: string, treasury_inbound_transfer?: string, treasury_issuing_authorization?: string, treasury_outbound_payment?: string, treasury_outbound_transfer?: string, treasury_received_credit?: string, treasury_received_debit?: string, type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $transaction_details Details copied from the transaction that this TransactionEntry belongs to.
 * @property null|string $treasury_transaction_entry The v1 Treasury transaction entry associated with this transaction entry.
 */
class TransactionEntry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction_entry';
}
