<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Signals;

/**
 * An automatically evaluated signal on an account. Each Account Signal object corresponds to
 * exactly one signal type, indicated by type. Only the type-specific field is populated; other
 * type-specific payload fields are null. If an account has multiple signals, Stripe creates
 * separate account signal objects.
 *
 * @property string $id Unique identifier for the account signal.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{account?: string, customer?: string}&\Stripe\StripeObject) $account_details The account or customer this signal is associated with.
 * @property null|string $account_evaluation The account evaluation that produced this signal, if applicable.
 * @property string $created Timestamp at which the signal was created.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property string $type The type of signal.
 * @property null|(object{risk_level: string, score?: string}&\Stripe\StripeObject) $user_account_sharing Data for the user account-sharing signal. Present only when type is user_account_sharing.
 * @property null|(object{risk_level: string, score?: string}&\Stripe\StripeObject) $user_multi_accounting Data for the user multi-accounting signal. Present only when type is user_multi_accounting.
 */
class AccountSignal extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.signals.account_signal';

    public static function fieldEncodings()
    {
        return [
            'user_account_sharing' => [
                'kind' => 'object',
                'fields' => ['score' => ['kind' => 'decimal_string']],
            ],
            'user_multi_accounting' => [
                'kind' => 'object',
                'fields' => ['score' => ['kind' => 'decimal_string']],
            ],
        ];
    }

    const TYPE_USER_ACCOUNT_SHARING = 'user_account_sharing';
    const TYPE_USER_MULTI_ACCOUNTING = 'user_multi_accounting';
}
