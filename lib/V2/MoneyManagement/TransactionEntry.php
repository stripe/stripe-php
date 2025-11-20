<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * TransactionEntries represent individual money movements across different states within a Transaction.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{available: (object{value?: int, currency?: string}&\Stripe\StripeObject), inbound_pending: (object{value?: int, currency?: string}&\Stripe\StripeObject), outbound_pending: (object{value?: int, currency?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $balance_impact The delta to the FinancialAccount's balance.
 * @property int $created Time at which the object was created.
 * @property int $effective_at Time at which the entry impacted (or will impact if it's in the future) the FinancialAccount balance.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $transaction The Transaction that this TransactionEntry belongs to.
 * @property (object{category: string, financial_account: string, flow: (object{type: string, adjustment?: string, currency_conversion?: string, fee_transaction?: string, inbound_transfer?: string, outbound_payment?: string, outbound_transfer?: string, received_credit?: string, received_debit?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $transaction_details Details copied from the transaction that this TransactionEntry belongs to.
 */
class TransactionEntry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction_entry';
}
