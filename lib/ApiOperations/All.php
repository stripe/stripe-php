<?php

namespace Stripe\ApiOperations;

/**
 * Trait for listable resources. Adds a `all()` static method to the class.
 *
 * This trait should only be applied to classes that derive from ApiResource.
 */
trait All
{
    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return Collection of ApiResources
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }
}
