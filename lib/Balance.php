<?php

namespace Stripe;

/**
 * Class Balance
 *
 * @property string $object
 * @property \Stripe\StripeObject[] $available
 * @property \Stripe\StripeObject[] $connect_reserved
 * @property bool $livemode
 * @property \Stripe\StripeObject[] $pending
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
