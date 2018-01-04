<?php

namespace Stripe\ApiOperations;

/**
 * Trait for creatable resources. Adds a `create()` static method to the class.
 *
 * This trait should only be applied to classes that derive from ApiResource.
 */
trait Create
{
    /**
     * @param array|null $params
     * @param array|string|null $options
     *
     * @return ApiResource The created resource.
     */
    public static function create($params = null, $options = null)
    {
        return self::_create($params, $options);
    }
}
