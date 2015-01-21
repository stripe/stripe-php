<?php

namespace Stripe;

class Account extends SingletonApiResource
{
    /**
     * @param string|null $apiKey
     *
     * @return Account
     */
    public static function retrieve($apiKey = null)
    {
        return self::_singletonRetrieve($apiKey);
    }
}
