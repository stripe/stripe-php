<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * TransactionEntries model funds moving between availability states for a given Transaction.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{available: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\Stripe\StripeObject) $balance_impact The change to the FinancialAccount's balance that takes effect at this TransactionEntry's <code>effective_at</code> timestamp.
 * @property string $created Time at which the object was created. Represented as an RFC 3339 timestamp in UTC with millisecond precision, for example <code>2022-09-18T13:22:18.123Z</code>.
 * @property string $effective_at Time at which the TransactionEntry affects the FinancialAccount balance. This can be in the past or future.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $transaction The ID of the Transaction that this TransactionEntry belongs to.
 * @property (object{category: string, financial_account: string, flow?: (object{adjustment?: string, currency_conversion?: string, fee_batch?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, received_credit?: string, received_debit?: string, type: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $transaction_details Details copied from the Transaction that this TransactionEntry belongs to.
 */
class TransactionEntry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction_entry';
}
