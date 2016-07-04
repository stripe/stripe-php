<?php

namespace Stripe;

/**
 * Class Balance
 *
 * @param string $object
 * @param mixed $available
 * @param bool $livedmode
 * @param mixed $pending
 *
 * @package Stripe
 */
class Balance extends SingletonApiResource
{
    /**
     * @param array|string|null $opts
     *
     * @return Balance
     */
    public static function retrieve($opts = null)
    {
        return self::_singletonRetrieve($opts);
    }
}
