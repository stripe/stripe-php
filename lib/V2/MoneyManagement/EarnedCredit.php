<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\MoneyManagement;

/**
 * The EarnedCredit object.
 *
 * @property string $id Unique identifier for the EarnedCredit.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property \Stripe\StripeObject $amount The amount and currency of the EarnedCredit.
 * @property string $created Time at which the EarnedCredit was created.
 * @property string $description Description of the EarnedCredit.
 * @property string $financial_account The FinancialAccount that earned the credit.
 * @property bool $livemode Has the value true if the object exists in live mode.
 * @property null|(object{end_date: string, start_date: string}&\Stripe\StripeObject) $period The period during which the credit was earned.
 * @property null|(object{type: string}&\Stripe\StripeObject) $revenue_share Details about the revenue share that caused the EarnedCredit.
 * @property null|(object{earned_from: string, from_account: string, outbound_payment: string}&\Stripe\StripeObject) $reward Details about the reward that caused the EarnedCredit.
 * @property string $status The status of the EarnedCredit.
 * @property (object{succeeded_at?: string}&\Stripe\StripeObject) $status_transitions Timestamps for EarnedCredit status transitions.
 * @property string $type The type of flow that caused the EarnedCredit.
 */
class EarnedCredit extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.money_management.earned_credit';

    const STATUS_SUCCEEDED = 'succeeded';

    const TYPE_INTEREST = 'interest';
    const TYPE_REVENUE_SHARE = 'revenue_share';
    const TYPE_REWARD = 'reward';
}
