<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Payments;

/**
 * SettlementAllocationIntent resource.
 *
 * @property string $id Unique identifier for the SettlementAllocationIntent.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount The amount and currency of the SettlementAllocationIntent.
 * @property int $created Timestamp at which SettlementAllocationIntent was created .
 * @property int $expected_settlement_date Date when we expect to receive the funds.
 * @property string $financial_account FinancialAccount ID where the funds are expected.
 * @property string[] $linked_credits List of ReceivedCredits that matched with the SettlementAllocationIntent.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Metadata associated with the SettlementAllocationIntent.
 * @property string $reference Reference for the SettlementAllocationIntent. This is the transaction reference used by payments processor to send funds to Stripe .
 * @property string $status SettlementAllocationIntent status.
 * @property null|(object{errored?: (object{doc_url?: string, message: string, reason_code: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $status_details Status details for a SettlementAllocationIntent in <code>errored</code> state.
 */
class SettlementAllocationIntent extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.payments.settlement_allocation_intent';

    const STATUS_CANCELED = 'canceled';
    const STATUS_ERRORED = 'errored';
    const STATUS_MATCHED = 'matched';
    const STATUS_PENDING = 'pending';
    const STATUS_SETTLED = 'settled';
    const STATUS_SUBMITTED = 'submitted';
}
