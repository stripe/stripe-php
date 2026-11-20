<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A DisputeAdjustment records a money movement associated with a Dispute.
 *
 * @property string $id Unique identifier for the DisputeAdjustment.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount and currency of the DisputeAdjustment.
 * @property string $created The time at which the DisputeAdjustment was created.
 * @property string $financial_account The ID of the FinancialAccount associated with the DisputeAdjustment.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property (object{dispute?: string, type: string}&\Stripe\StripeObject) $related_dispute The Dispute associated with this DisputeAdjustment.
 */
class DisputeAdjustment extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.dispute_adjustment';
}
