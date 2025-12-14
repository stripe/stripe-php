<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Payments;

/**
 * SettlementAllocationIntentSplit resource.
 *
 * @property string $id Unique identifier for the SettlementAllocationIntentSplit.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $account The account id against which the SettlementAllocationIntentSplit should be settled.
 * @property (object{value?: int, currency?: string}&\Stripe\StripeObject) $amount The amount and currency of the SettlementAllocationIntentSplit.
 * @property int $created Timestamp at which SettlementAllocationIntentSplit was created.
 * @property (object{type: string, outbound_payment?: string, outbound_transfer?: string, received_credit?: string}&\Stripe\StripeObject) $flow Details about the Flow object that settled the split.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $settlement_allocation_intent The ID of the SettlementAllocationIntent that this split belongs too.
 * @property string $status The status of the SettlementAllocationIntentSplit.
 * @property string $type The type of the SettlementAllocationIntentSplit.
 */
class SettlementAllocationIntentSplit extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.payments.settlement_allocation_intent_split';

    const STATUS_CANCELED = 'canceled';
    const STATUS_PENDING = 'pending';
    const STATUS_SETTLED = 'settled';

    const TYPE_CREDIT = 'credit';
    const TYPE_DEBIT = 'debit';
}
