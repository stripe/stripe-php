<?php

// File generated from our OpenAPI spec

namespace Stripe\V2;

/**
 * TransactionEntries represent individual money movements across different states within a Transaction.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{available: \Stripe\StripeObject, inbound_pending: \Stripe\StripeObject, outbound_pending: \Stripe\StripeObject}&\stdClass&\Stripe\StripeObject) $balance_impact The delta to the FinancialAccount's balance.
 * @property int $created Time at which the object was created.
 * @property int $effective_at Time at which the entry impacted (or will impact if it's in the future) the FinancialAccount balance.
 * @property string $transaction The Transaction that this TransactionEntry belongs to.
 * @property (object{category: string, financial_account: string, flow: (object{type: string, adjustment: null|string, fee_transaction: null|string, inbound_transfer: null|string, outbound_payment: null|string, outbound_transfer: null|string, received_credit: null|string, received_debit: null|string}&\stdClass&\Stripe\StripeObject)}&\stdClass&\Stripe\StripeObject) $transaction_details Details copied from the transaction that this TransactionEntry belongs to.
 */
class TransactionEntry extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.transaction_entry';
}
