<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Signals;

/**
 * An automatically evaluated signal on a v2 account.
 *
 * @property string $id Unique identifier for the account signal.
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property null|(object{account?: string, customer?: string}&\Stripe\StripeObject) $account_details The account or customer this signal is associated with.
 * @property int $created Timestamp at which the signal was created.
 * @property null|(object{indicators: (object{explanation: string, impact: string, indicator: string}&\Stripe\StripeObject)[], probability?: string, risk_level: string}&\Stripe\StripeObject) $fraudulent_merchant Data for the fraudulent merchant signal. Present only when type is fraudulent_merchant.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{indicators: (object{explanation: string, impact: string, indicator: string}&\Stripe\StripeObject)[], probability?: string, risk_level: string}&\Stripe\StripeObject) $merchant_delinquency Data for the merchant delinquency signal. Present only when type is merchant_delinquency.
 * @property string $type The type of signal.
 */
class AccountSignal extends \Stripe\ApiResource
{
    const OBJECT_NAME = 'v2.signals.account_signal';

    public static function fieldEncodings()
    {
        return [
            'fraudulent_merchant' => [
                'kind' => 'object',
                'fields' => ['probability' => ['kind' => 'decimal_string']],
            ],
            'merchant_delinquency' => [
                'kind' => 'object',
                'fields' => ['probability' => ['kind' => 'decimal_string']],
            ],
        ];
    }

    const TYPE_FRAUDULENT_MERCHANT = 'fraudulent_merchant';
    const TYPE_MERCHANT_DELINQUENCY = 'merchant_delinquency';
}
