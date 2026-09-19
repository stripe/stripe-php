<?php

// File generated from our OpenAPI spec

namespace Stripe\V2\Provisioning;

/**
 * A customer's payment method and its usage limits.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value of the object field.
 * @property string $card_last4 Last 4 digits of the card on the payment method.
 * @property bool $livemode Whether the payment method is in live mode.
 * @property null|string $payment_method_owner Owner of the payment method.
 * @property (object{provider: string, usage_limits?: (object{currency: string, max_amount: int, recurring_interval: string}&\Stripe\StripeObject)}&\Stripe\StripeObject)[] $providers Providers the payment method is shared with, and their usage limits.
 * @property string[] $shared_with_providers Deprecated: use providers instead.
 * @property null|(object{currency: string, max_amount: int, recurring_interval: string}&\Stripe\StripeObject) $usage_limits Usage limit applied to the payment method.
 */
class PaymentProfile extends \Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'v2.provisioning.payment_profile';

    public static function fieldEncodings()
    {
        return [
            'providers' => [
                'kind' => 'array',
                'element' => [
                    'kind' => 'object',
                    'fields' => [
                        'usage_limits' => [
                            'kind' => 'object',
                            'fields' => [
                                'max_amount' => ['kind' => 'int64_string'],
                            ],
                        ],
                    ],
                ],
            ],
            'usage_limits' => [
                'kind' => 'object',
                'fields' => ['max_amount' => ['kind' => 'int64_string']],
            ],
        ];
    }
}
