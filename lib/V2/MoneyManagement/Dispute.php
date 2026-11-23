<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * A Dispute tracks a claim challenging a money movement on behalf of a FinancialAccount holder.
 *
 * @property string $id Unique identifier for the Dispute.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount and currency of the disputed money movement.
 * @property string $created The time at which the dispute was created.
 * @property null|string $explanation Additional explanation for the dispute, if supplied.
 * @property string $financial_account The FinancialAccount associated with the disputed money movement.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|\Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property string $reason The FinancialAccount holder's reason for disputing the money movement.
 * @property string $status The current status of the dispute.
 * @property null|(object{lost_at?: string, won_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps describing when the dispute changed status.
 * @property (object{received_debit?: string, type: string}&\Stripe\StripeObject) $target The money movement being disputed.
 */
class Dispute extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.dispute';

    const REASON_AUTHORIZATION_REVOKED = 'authorization_revoked';
    const REASON_DUPLICATE = 'duplicate';
    const REASON_INCORRECT_AMOUNT = 'incorrect_amount';
    const REASON_INCORRECT_DATE = 'incorrect_date';
    const REASON_OTHER = 'other';
    const REASON_UNAUTHORIZED = 'unauthorized';

    const STATUS_LOST = 'lost';
    const STATUS_UNDER_REVIEW = 'under_review';
    const STATUS_WON = 'won';
}
