<?php

namespace Stripe;

class Balance extends SingletonApiResource
{
    /**
    * @param string|null $apiKey
    *
    * @return Balance
    */
    public static function retrieve($apiKey = null)
    {
        $class = get_class();
        return self::_scopedSingletonRetrieve($class, $apiKey);
    }
}
