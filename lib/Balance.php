<?php

namespace Stripe;

/**
 * Class Balance
 *
 * @property string $object
 * @property mixed $available
 * @property mixed $connect_reserved
 * @property bool $livemode
 * @property mixed $pending
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
     * @return Balance
     */
    public static function retrieve($opts = null)
    {
        return self::_singletonRetrieve($opts);
    }
}
