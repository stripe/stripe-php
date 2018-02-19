<?php

namespace Stripe\ApiOperations;

/**
 * Trait for creatable resources. Adds a `create()` static method to the class.
 *
 * This trait should only be applied to classes that derive from StripeObject.
 */
trait Create
{
    /**
     * @param array|null        $params
     * @param array|string|null $options
     *
     * @return \Stripe\ApiResource The created resource.
     * @throws \Stripe\Error\Api
     * @throws \Stripe\Error\ApiConnection
     * @throws \Stripe\Error\Authentication
     * @throws \Stripe\Error\Card
     * @throws \Stripe\Error\Idempotency
     * @throws \Stripe\Error\InvalidRequest
     * @throws \Stripe\Error\Permission
     * @throws \Stripe\Error\RateLimit
     */
    public static function create($params = null, $options = null)
    {
        self::_validateParams($params);
        $url = static::classUrl();

        list($response, $opts) = static::_staticRequest('post', $url, $params, $options);
        $obj = \Stripe\Util\Util::convertToStripeObject($response->json, $opts);
        $obj->setLastResponse($response);
        return $obj;
    }
}
