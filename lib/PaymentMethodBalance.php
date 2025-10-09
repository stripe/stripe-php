<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * PaymentMethodBalance objects represent balances available on a payment method.
 * You can use v1/payment_methods/:id/check_balance to check the balance of a payment method.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $as_of The time at which the balance was calculated. Measured in seconds since the Unix epoch.
 * @property (object{fr_meal_voucher: null|(object{available: null|(object{amount: int, currency: string}&StripeObject)[]}&StripeObject)}&StripeObject) $balance BalanceEntry contain information about every individual balance type of a card.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 */
class PaymentMethodBalance extends ApiResource
{
    const OBJECT_NAME = 'payment_method_balance';
}
