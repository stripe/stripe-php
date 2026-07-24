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
 * @property int $created Timestamp at which the signal was created.
 * @property null|(object{indicators: (object{explanation: string, impact: string, indicator: string}&\Stripe\StripeObject)[], probability?: string, risk_level: string}&\Stripe\StripeObject) $fraudulent_merchant Data for the fraudulent merchant signal. Present only when type is fraudulent_merchant.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property null|(object{indicators: (object{explanation: string, impact: string, indicator: string}&\Stripe\StripeObject)[], probability?: string, risk_level: string}&\Stripe\StripeObject) $merchant_delinquency Data for the merchant delinquency signal. Present only when type is merchant_delinquency.
 * @property null|(object{additional_details: (object{gross_exposure_amount?: (object{currency: string, value: int}&\Stripe\StripeObject), loss_given_default_in_percentages?: int, predicted_dispute_window_in_days?: int}&\Stripe\StripeObject), exposure_amount: (object{currency: string, value: int}&\Stripe\StripeObject)}&\Stripe\StripeObject) $payment_delinquency_exposure Data for the payment delinquency exposure signal. Present only when type is payment_delinquency_exposure.
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
            'payment_delinquency_exposure' => [
                'kind' => 'object',
                'fields' => [
                    'additional_details' => [
                        'kind' => 'object',
                        'fields' => [
                            'gross_exposure_amount' => [
                                'kind' => 'object',
                                'fields' => [
                                    'value' => ['kind' => 'int64_string'],
                                ],
                            ],
                        ],
                    ],
                    'exposure_amount' => [
                        'kind' => 'object',
                        'fields' => ['value' => ['kind' => 'int64_string']],
                    ],
                ],
            ],
        ];
    }

    const TYPE_FRAUDULENT_MERCHANT = 'fraudulent_merchant';
    const TYPE_MERCHANT_DELINQUENCY = 'merchant_delinquency';
    const TYPE_PAYMENT_DELINQUENCY_EXPOSURE = 'payment_delinquency_exposure';
}
