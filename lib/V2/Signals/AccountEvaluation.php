<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Signals;

/**
 * Account Evaluation resource for the Signals API.
 *
 * @property string $id Unique identifier for the account evaluation.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{account_activity?: string}&\Stripe\StripeObject) $account_activity_details Account activity recorded alongside this evaluation, when applicable.
 * @property (object{account?: string, customer?: string, data?: (object{defaults?: (object{profile: (object{business_url: string, doing_business_as?: string, product_description?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject)}&\Stripe\StripeObject) $account_details The account, customer, or inline account data being evaluated.
 * @property string $created Timestamp at which the evaluation was created.
 * @property null|(object{user_account_sharing?: (object{evaluated_at?: string, risk_level: string, score?: string, signal?: string}&\Stripe\StripeObject), user_multi_accounting?: (object{evaluated_at?: string, risk_level: string, score?: string, signal?: string}&\Stripe\StripeObject)}&\Stripe\StripeObject) $evaluated_signals Signal results that are available for the evaluation.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string[] $pending_signals List of signals still pending evaluation.
 * @property string[] $requested_signals List of signals requested for evaluation.
 */
class AccountEvaluation extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.signals.account_evaluation';

    public static function fieldEncodings()
    {
        return [
            'evaluated_signals' => [
                'kind' => 'object',
                'fields' => [
                    'user_account_sharing' => [
                        'kind' => 'object',
                        'fields' => ['score' => ['kind' => 'decimal_string']],
                    ],
                    'user_multi_accounting' => [
                        'kind' => 'object',
                        'fields' => ['score' => ['kind' => 'decimal_string']],
                    ],
                ],
            ],
        ];
    }
}
