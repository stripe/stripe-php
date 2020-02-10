<?php

namespace Stripe;

/**
 * Class Balance
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property \Stripe\StripeObject[] $available Funds that are available to be transferred or paid out, whether automatically by Stripe or explicitly via the <a href="#transfers">Transfers API</a> or <a href="#payouts">Payouts API</a>. The available balance for each currency and payment type can be found in the <code>source_types</code> property.
 * @property \Stripe\StripeObject[] $connect_reserved Funds held due to negative balances on connected Custom accounts. The connect reserve balance for each currency and payment type can be found in the <code>source_types</code> property.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject[] $pending Funds that are not yet available in the balance, due to the 7-day rolling pay cycle. The pending balance for each currency, and for each payment type, can be found in the <code>source_types</code> property.
 *
 * @package Stripe
 */
class Balance extends SingletonApiResource
{
    const OBJECT_NAME = 'balance';

    /**
     * @param array|string|null $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Balance
     */
    public static function retrieve($opts = null)
    {
        return self::_singletonRetrieve($opts);
    }
}
